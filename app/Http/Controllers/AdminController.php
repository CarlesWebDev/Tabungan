<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;
use App\Models\tabungan;
use App\Models\Kelas;
use App\Models\Siswa;

class AdminController extends Controller
{

    // User
    public function Users()
    {
        // misalnya menampilkan view
        $gurus = Guru::all();
        $kelas = Kelas::first();
        // $siswas = Siswa::all();
        $siswas = Siswa::with('kelas')->get();
        $guruTidakAktif = Guru::where('is_active', false)->count();
        $siswaTidakAktif = Siswa::where('is_active', false)->count();
        $guruAktif = Guru::where('is_active', true)->count();
        $siswaAktif = Siswa::where('is_active', true)->count();
        return view('admin.User', compact('gurus', 'siswas', 'guruTidakAktif', 'siswaTidakAktif', 'guruAktif', 'siswaAktif'));
    }


    // ManagemenT kelas
    // //    public function adminDashboard()
    // // {
    // //     $siswas = Siswa::with('tabungan')->get();
    // //     $gurus = Guru::all();

    // //     // Hitung total tabungan
    // //     $totalSetoran = Tabungan::where('jenis_penarikan', 'setoran')->sum('jumlah');
    // //     $totalPenarikan = Tabungan::where('jenis_penarikan', 'penarikan')->sum('jumlah');
    // //     $totalTabungan = $totalSetoran - $totalPenarikan;

    // //     return view('admin.dashboard', compct('siswas', 'gurus', 'totalTabungan'));
    // // }






    public function adminDashboard()
    {

        // Ambil semua data siswa, guru, admin dan kelas beserta relasi wali kelas

        $siswas = Siswa::with('tabungan')->get();
        $gurus = Guru::all();
        $kelas = Kelas::with('guru')->get();


        // Total setoran & penarikan seluruh siswa
        $totalSetoran = Tabungan::where('jenis_penarikan', 'setoran')->sum('jumlah');
        $totalPenarikan = Tabungan::where('jenis_penarikan', 'penarikan')->sum('jumlah');
        $totalTabungan = $totalSetoran - $totalPenarikan;

        // Inisialisasi array per kelas
        $setoranDetailsByKelas = [];
        $penarikanDetailsByKelas = [];
        $totalTabunganPerKelas = [];
        $rataRataPerKelas = [];
        $totalSetoranPerKelas = [];
        $totalPenarikanPerKelas = [];
        $jumlahTransaksiPerKelas = [];
        $jumlahSiswaPerKelas = [];
        $waliKelas = [];
        $kelasIds = [];
        $keyKelas = '';

        // Statistik untuk keseluruhan
        $jumlahSiswaAktif = Siswa::where('is_active', true)
            ->whereHas('tabungan')
            ->count();

        foreach ($kelas as $itemKelas) {
            $tingkatKelas = $itemKelas->tingkat;
            $namaKelas = $itemKelas->nama_kelas;
            $keyKelas = $tingkatKelas . ' ' . $namaKelas;

            // tambahin ini buat export
            $kelasIds[$keyKelas] = $itemKelas->id;

            // Ambil nama wali kelas
            $waliKelas[$keyKelas] = $itemKelas->guru->name ?? 'Tidak ada wali kelas';

            // Data setoran
            $setoran = Tabungan::where('jenis_penarikan', 'setoran')
                ->whereHas('siswa', fn($q) => $q->where('kelas_id', $itemKelas->id))
                ->sum('jumlah');

            // Data penarikan
            $penarikan = Tabungan::where('jenis_penarikan', 'penarikan')
                ->whereHas('siswa', fn($q) => $q->where('kelas_id', $itemKelas->id))
                ->sum('jumlah');

            $saldo = $setoran - $penarikan;
            $jumlahTransaksi = Tabungan::whereHas('siswa', fn($q) => $q->where('kelas_id', $itemKelas->id))->count();
            $rataRataPerTransaksi = $jumlahTransaksi > 0 ? $saldo / $jumlahTransaksi : 0;

            $jumlahSiswa = Siswa::where('kelas_id', $itemKelas->id)
                ->where('is_active', true)
                ->whereHas('tabungan')
                ->count();

            // DETAIL SETORAN PER SISWA
            // DETAIL SETORAN PER SISWA
            $setoranDetailsByKelas[$keyKelas] = Tabungan::where('jenis_penarikan', 'setoran')
                ->whereHas('siswa', fn($q) => $q->where('kelas_id', $itemKelas->id))
                ->with('siswa')
                ->get()
                ->groupBy('siswa_id')
                ->map(function ($transactions) {
                    return [
                        'nama' => $transactions->first()->siswa->name,
                        'total' => $transactions->sum('jumlah'),
                        'count' => $transactions->count(),
                        // Cek jika rincian transaksi setoran terdeteksi dengan benar
                        'rincian' => $transactions->map(fn($t) => 'nabung(' . number_format($t->jumlah, 0, ',', '.') . ')')->implode(', ')
                    ];
                })
                ->values()
                ->toArray();



            // DETAIL PENARIKAN PER SISWA
            $penarikanDetailsByKelas[$keyKelas] = Tabungan::where('jenis_penarikan', 'penarikan')
                ->whereHas('siswa', fn($q) => $q->where('kelas_id', $itemKelas->id))
                ->with('siswa')
                ->get()
                ->groupBy('siswa_id')
                ->map(function ($transactions) {
                    return [
                        'nama' => $transactions->first()->siswa->name,
                        'total' => $transactions->sum('jumlah'),
                        'count' => $transactions->count(),
                        'rincian' => $transactions->map(fn($t) => 'tarik(' . number_format($t->jumlah, 0, ',', '.') . ')')->implode(', ')
                    ];
                })
                ->values()
                ->toArray();


            // Simpan data ke array
            $totalTabunganPerKelas[$keyKelas] = $saldo;
            $rataRataPerKelas[$keyKelas] = $rataRataPerTransaksi;
            $totalSetoranPerKelas[$keyKelas] = $setoran;
            $totalPenarikanPerKelas[$keyKelas] = $penarikan;
            $jumlahTransaksiPerKelas[$keyKelas] = $jumlahTransaksi;
            $jumlahSiswaPerKelas[$keyKelas] = $jumlahSiswa;
        }

        return view('admin.dashboard', compact(
            'siswas',
            'gurus',
            'totalTabungan',
            'totalTabunganPerKelas',
            'rataRataPerKelas',
            'totalSetoranPerKelas',
            'totalPenarikanPerKelas',
            'jumlahTransaksiPerKelas',
            'jumlahSiswaAktif',
            'jumlahSiswaPerKelas',
            'waliKelas',
            'setoranDetailsByKelas',
            'penarikanDetailsByKelas',
            'kelasIds',
        ));
    }






    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.adminlogin');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // keamanan sesi
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'email atau password yang anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout admin.
     */
    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout admin
        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken(); // Regenerasi token untuk keamanan
        return redirect()->route('login.admin.form'); // Redirect ke form login admin
    }


    // Notifikasi
    public function notifikasi()
    {
        return view('admin.notifikasi');
    }



    // tambah Akun Guru
    public function createguru()
    {
        return view('admin.tambahguru');
    }

    public function storeguru(Request $request)
    {
        $request->validate([
            'nip' => 'required|min:18',
            'name' => 'required',
            'email' => 'required|email|unique:gurus,email',
            'password' => 'required|min:8',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teacher',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function hapusguru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Guru berhasil dihapus.');
    }

    public function editguru($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.editguru', compact('guru'));
    }

    public function updateguru(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip' => 'required|min:18',
            'name' => 'required',
            'email' => 'required|email|unique:gurus,email,' . $guru->id,
            'password' => 'nullable|min:8',
        ]);

        // Update password jika diisi jika tidak password akan sama
        if ($request->filled('password')) {
            $guru->password = Hash::make($request->password);
        }


        $guru->nip = $request->nip;
        $guru->name = $request->name;
        $guru->email = $request->email;

        $guru->save();

        return redirect()->route('admin.dashboard')->with('success', 'Guru berhasil diubah.');
    }




    // Tambah Murid
    public function createsiswa()
    {
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        return view('admin.tambahsiswa', compact('kelas', 'siswas'));
    }

    public function storesiswa(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nis' => 'required|min:10',
            'name' => 'required',
            'email' => 'required|email|unique:siswas,email',
            'password' => 'required|min:8',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas_id' => $request->kelas_id,
            'role' => 'student',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Edit Siswa
    public function editsiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.editsiswa', compact('siswa', 'kelas'));
    }

    public function updatesiswa(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|min:10',
            'name' => 'required',
            'email' => 'required|email|unique:siswas,email,' . $siswa->id,
            'password' => 'nullable|min:8',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // Update password jika diisi jika tidak password akan sama
        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

        $siswa->nis = $request->nis;
        $siswa->name = $request->name;
        $siswa->email = $request->email;
        $siswa->kelas_id = $request->kelas_id;

        $siswa->save();

        return redirect()->route('admin.dashboard')->with('success', 'Siswa berhasil diubah.');
    }

    public function hapusSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Siswa berhasil dihapus.');
    }



    // Crud Kelas
    public function Kelas(Request $request)
    {
        $totalSiswa = Siswa::count();


        $kata_kunci = $request->input('kata_kunci');

        // Ambil data kelas dengan jumlah siswa, dipaginasi, dan difilter berdasarkan kata kunci
        $kelas = Kelas::withCount('siswas')
            ->when($kata_kunci, function ($query, $kata_kunci) {
                // Filter berdasarkan nama kelas atau jurusan
                $query->where('nama_kelas', 'like', "%$kata_kunci%")
                    ->orWhere('jurusan', 'like', "%$kata_kunci%");
            })
            ->paginate(10);


        return view('admin.managementkelas', compact('kelas', 'totalSiswa'));
    }


    public function createkelas()
    {
        $gurus = Guru::whereDoesntHave('kelas')->get();
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswas = Siswa::whereNull('kelas_id')->get();
        return view('admin.tambahkelas', compact('gurus', 'kelas', 'siswas',));
    }

    public function storeKelas(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
            'jurusan' => 'required',
            'tingkat' => 'required',
            // 'jumlah_siswa' => 'required',\
            'guru_id' => 'required|unique:kelas,guru_id',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'jurusan' => $request->jurusan,
            'tingkat' => $request->tingkat,
            // 'jumlah_siswa' => $request->jumlah_siswa,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin.Kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function editkelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        $gurus = Guru::all();
        // Mengambil semua data guru untuk dropdown
        return view('admin.editkelas', compact('kelas', 'gurus'));
    }
    public function updatekelas(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $kelas->id,
            'jurusan' => 'required',
            'tingkat' => 'required',
            // 'jumlah_siswa' => 'required',
            'guru_id' => 'required',
        ]);

        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->tingkat = $request->tingkat;
        // $kelas->jumlah_siswa = $request->jumlah_siswa;
        $kelas->guru_id = $request->guru_id;

        $kelas->save();

        return redirect()->route('admin.Kelas')->with('success', 'Kelas berhasil diubah.');
    }
    public function hapuskelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('admin.Kelas')->with('success', 'Kelas berhasil dihapus.');
    }




    // Verivikasi Akun
    public function LaporanTabungan()
    {
        return view('admin.laporanTabungan');
    }


    public function verifikasiakun()
    {
        $gurus = Guru::where('status', 'pending')->get();
        return view('admin.verivikasiakun', compact('gurus'));
    }


    public function showPendingGurus()
    {
        $gurus = Guru::where('status', 'pending')->get();
        return view('admin.verivikasiakun', compact('gurus'));
    }

    // public function approveGuru($guruId)
    // {
    //     $guru = Guru::findOrFail($guruId);
    //     $guru->status = 'approved'; // Ubah status menjadi approved
    //     $guru->save();

    //     return redirect()->back()->with('success', 'Akun guru berhasil disetujui.');
    // }

    // public function rejectGuru($guruId)
    // {
    //     $guru = Guru::findOrFail($guruId);
    //     $guru->status = 'rejected'; // Ubah status menjadi rejected
    //     $guru->save();

    //     return redirect()->back()->with('error', 'Akun guru ditolak.');
    // }



    public function approveGuru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->status = 'active';
        $guru->save();

        return redirect()->route('admin.verifikasiakun')->with('success', 'Akun guru disetujui.');
    }

    public function rejectGuru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->status = 'rejected';
        $guru->save();
        return redirect()->route('admin.verifikasiakun')->with('error', 'Akun guru ditolak.');
    }



    public function rejecteGuru(Guru $guru)
    {
        $guru->update(['status' => 'rejected']);
        return back()->with('success', 'Guru berhasil ditolak.');
    }
}
