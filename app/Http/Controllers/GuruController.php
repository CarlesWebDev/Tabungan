<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Tabungan;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class GuruController extends Controller
{
    /**
     * Display the login form for Guru.
     */
    public function showLoginFormGuru()
    {
        if (Auth::guard('guru')->check()) {
            return redirect()->route('Teacher.dashboard');
        }
        return view('auth.gurulogin');
    }

    /**
     * Login the guru.
     */
    // public function loginGuru(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'nip' => 'required|min:18',
    //         'password' => 'required|min:8',
    //     ]);

    //     // Ambil data guru berdasarkan NIP
    //     $guru = Guru::where('nip', $request->nip)->first();

    //     // Cek apakah guru ditemukan
    //     if (!$guru) {
    //         return back()->withErrors([
    //             'nip' => 'NIP tidak ditemukan.',
    //         ])->onlyInput('nip', 'password');
    //     }


    //     if (!$guru) {
    //         return back()->withErrors([
    //             'Password' => 'password yg anda masukan Salah',
    //         ])->onlyInput('nip', 'password');
    //     }

    //     if ($guru->status == 'pending') {
    //         return back()->withErrors(['email' => 'Akun Anda sedang dalam tahap pengajuan.'])->onlyInput('email');
    //     }
    //     if ($guru->status == 'rejected') {
    //         return back()->withErrors(['email' => 'Akun Anda telah ditolak oleh admin.'])->onlyInput('email');
    //     }
    //     // Cek apakah password sesuai
    //     if (!Hash::check($request->password, $guru->password)) {
    //         return back()->withErrors([
    //             'nip' => 'Kredensial tidak sesuai.',
    //         ])->onlyInput('nip', 'password');
    //     }



    //     // Cek status guru
    //     if ($guru->status !== 'active') {
    //         return back()->withErrors([
    //             'nip' => 'Akun Anda telah ditolak oleh admin.',
    //         ])->onlyInput('nip');
    //     }


    //     // Coba login
    //     if (Auth::guard('guru')->attempt($credentials)) {
    //         $request->session()->regenerate();

    //         // Update status aktif
    //         $guru->is_active = true;
    //         $guru->last_active_at = now();
    //         $guru->save();

    //         return redirect()->route('Teacher.dashboard');
    //     }

    //     return back()->withErrors([
    //         'nip' => 'Kredensial tidak sesuai.',
    //     ])->onlyInput('nip');
    // }


    public function loginGuru(Request $request)
    {
        $credentials = $request->validate([
            'nip' => 'required|min:18',
            'password' => 'required|min:8',
        ]);

        // Ambil data guru berdasarkan NIP
        $guru = Guru::where('nip', $request->nip)->first();

        if (!$guru) {
            return back()->withErrors([
                'nip' => 'NIP tidak ditemukan.',
            ])->onlyInput('nip', 'password');
        }

        // Cek status akun
        if ($guru->status == 'pending') {
            return back()->withErrors(['nip' => 'Akun Anda sedang dalam tahap pengajuan.'])->onlyInput('nip');
        }
        if ($guru->status == 'rejected') {
            return back()->withErrors(['nip' => 'Akun Anda telah ditolak oleh admin.'])->onlyInput('nip');
        }
        if ($guru->status !== 'active') {
            return back()->withErrors(['nip' => 'Akun Anda belum aktif.'])->onlyInput('nip');
        }

        // Cek password
        if (!Hash::check($request->password, $guru->password)) {
            return back()->withErrors([
                'password' => 'Password yang Anda masukkan salah.',
            ])->onlyInput('nip', 'password');
        }

        // Login
        // if (Auth::guard('guru')->attempt($credentials)) {
        //     $request->session()->regenerate();

        //     // Update status aktif
        //     $guru->update([
        //         'is_active' => true,
        //         'last_active_at' => now(),
        //     ]);

        //     return redirect()->route('Teacher.dashboard');
        // }

        if (Auth::guard('guru')->attempt($credentials)) {
            $request->session()->regenerate();

            // Update status aktif aja, jangan sentuh last_active_at
            $guru->update([
                'is_active' => true,
            ]);

            return redirect()->route('Teacher.dashboard');
        }

        return back()->withErrors([
            'nip' => 'Kredensial tidak sesuai.',
        ])->onlyInput('nip');
    }




    public function showregisterformGuru()
    {
        if (Auth::guard('guru')->check()) {
            return redirect()->route('Teacher.dashboard');
        }
        return view('auth.registerguru');
    }

    /**
     * Register the guru.
     */
    public function registerGuru(Request $request)
    {
        $request->validate([
            'nip' => 'required|min:18',
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|min:8',
            'verification_file' => 'required|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        // Simpan file verifikasip
        $filepath = $request->file('verification_file')->store('verification_files', 'public');

        //Simpan Ke Database
        Guru::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_file' => $filepath,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Guru baru telah mendaftar dan menunggu verifikasi.');

        return redirect()->route('login.guru.form')->with('success', 'Akun guru berhasil dibuat. Silakan tunggu verifikasi dari admin.');
    }


    // public function logoutGuru(Request $request)
    // {
    //     // Ambil data guru yang sedang login
    //     $guru = Auth::guard('guru')->user();

    //     // Update status guru menjadi nonaktif dan simpan ke database
    //     if ($guru) {
    //         $guru->is_active = false;
    //         $guru->last_active_at = now();
    //         // Gua nambahin ini di hari jumat 23-05-2025
    //         // $guru = Guru::findOrFail($guru->id);
    //         $guru->save();
    //     }


    //     Auth::guard('guru')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('login.guru.form'); // Redirect ke halaman login guru
    // }



    public function dashboardGuru(Request $request)
    {
        $guru = auth('guru')->user();

        // Hitung total pemasukan dan penarikan
        $totalPemasukan = Tabungan::where('nama_guru', $guru->name)
            ->where('jenis_penarikan', 'setoran')
            ->sum('jumlah');

        $totalPenarikan = Tabungan::where('nama_guru', $guru->name)
            ->where('jenis_penarikan', 'penarikan')
            ->sum('jumlah');

        // Filter transaksi berdasarkan input dari form
        $transaksiQuery = Tabungan::where('nama_guru', $guru->name);

        if ($request->filled('search')) {
            $transaksiQuery->where('nama_siswa', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('tanggal')) {
            $transaksiQuery->whereDate('tanggal', $request->tanggal);
        }

        if ($request->filled('jenis')) {
            $transaksiQuery->where('jenis_penarikan', $request->jenis);
        }

        $transaksis = $transaksiQuery->latest()->get();

        return view('Teacher.dashboard', compact('totalPemasukan', 'totalPenarikan', 'transaksis'));
    }





    public function tabungan(Request $request)
    {
        $guru = auth('guru')->user();

        $query = Tabungan::where('nama_guru', $guru->name);

        // Filter nama
        if ($request->has('search') && $request->search !== null) {
            $query->where('nama_siswa', 'like', '%' . $request->search . '%');
        }

        // Filter Tanggal
        if ($request->has('tanggal') && $request->tanggal !== null) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // $tabungan = $query->orderBy('tanggal', 'desc')->get();
        $tabungan = $query->orderBy('tanggal', 'desc')->paginate(10);

        return view('Teacher.transaksi', compact('tabungan'));
    }


    public function createtabungan()
    {
        // Dapatkan ID guru yang sedang login
        $guruId = auth('guru')->user()->id;

        // Dapatkan kelas yang diajar oleh guru ini menggunakan guru_id
        $kelas = Kelas::where('guru_id', $guruId)->get();

        // Dapatkan siswa hanya dari kelas tersebut
        $siswas = Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        return view('Teacher.tambahtabungan', compact('siswas'));
    }



    public function Datasiswa(Request $request)
    {
        $guruId = auth('guru')->user()->id;

        $kelasIds = Kelas::where('guru_id', $guruId)->pluck('id');

        $query = Siswa::whereIn('kelas_id', $kelasIds)->with('kelas');

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('nis', 'like', '%' . $keyword . '%')
                    ->orWhereHas('kelas', function ($q2) use ($keyword) {
                        $q2->where('nama_kelas', 'like', '%' . $keyword . '%');
                    });
            });
        }

        $siswas = $query->get();

        return view('Teacher.datasiswa', compact('siswas'));
    }





    public function storetabungan(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_guru' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis_penarikan' => 'required|in:setoran,penarikan',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        // Ambil nama_siswa berdasarkan siswa_id
        $siswa = Siswa::findOrFail($request->siswa_id);
        $nama_siswa = $siswa->name; // Asumsi kolom 'name' adalah nama siswa

        Tabungan::create([
            'siswa_id' => $request->siswa_id,
            'nama_siswa' => $nama_siswa,  // Simpan nama siswa
            'nama_guru' => $request->nama_guru,
            'tanggal' => $request->tanggal,
            'jenis_penarikan' => $request->jenis_penarikan,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('Teacher.transaksi')->with('success', 'Transaksi berhasil dibuat.');
    }



    public function edittabungan($id)
    {
        // Dapatkan ID guru yang sedang login
        $guruId = auth('guru')->user()->id;

        // Dapatkan kelas yang diajar oleh guru ini menggunakan guru_id
        $kelas = Kelas::where('guru_id', $guruId)->get();

        // Dapatkan siswa hanya dari kelas tersebut
        $siswas = Siswa::whereIn('kelas_id', $kelas->pluck('id'))->get();

        // Ambil data tabungan berdasarkan id
        $tabungan = Tabungan::findOrFail($id);

        // Kirim data tabungan dan siswa yang ada
        return view('teacher.edittabungan', compact('tabungan', 'siswas'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'nama_guru' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis_penarikan' => 'required|in:setoran,penarikan',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        // Ambil nama_siswa berdasarkan siswa_id
        $siswa = Siswa::findOrFail($request->siswa_id);
        $nama_siswa = $siswa->name;

        $tabungan = Tabungan::findOrFail($id);
        $tabungan->update([
            'siswa_id' => $request->siswa_id,
            'nama_siswa' => $nama_siswa, // Tambahkan ini
            'nama_guru' => $request->nama_guru,
            'tanggal' => $request->tanggal,
            'jenis_penarikan' => $request->jenis_penarikan,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('Teacher.transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $tabungan->delete();
        return redirect()->route('Teacher.transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }


    public function logoutGuru(Request $request)
    {
        $guru = Auth::guard('guru')->user();

        if ($guru) {
            $guru->update([
                'is_active' => false,
                'last_active_at' => now(),
            ]);
        }

        Auth::guard('guru')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.guru.form');
    }
}
