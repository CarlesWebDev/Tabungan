<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tabungan;
use App\Models\notikasi;


class SiswaController extends Controller
{

    public function dashboard()
    {
        $siswa = Auth::guard('siswa')->user();

        $totalSetoran = Tabungan::where('siswa_id', $siswa->id)
            ->where('jenis_penarikan', 'setoran')
            ->sum('jumlah');

        $totalPenarikan = Tabungan::where('siswa_id', $siswa->id)
            ->where('jenis_penarikan', 'penarikan')
            ->sum('jumlah');

        $totalTabungan = $totalSetoran - $totalPenarikan;

        $transaksiTerakhir = Tabungan::where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->take(5)
            ->get();

        // Contoh chart bulanan
        $dataPerBulan = Tabungan::selectRaw('MONTH(tanggal) as bulan, SUM(CASE WHEN jenis_penarikan = "setoran" THEN jumlah ELSE -jumlah END) as saldo')
            ->where('siswa_id', $siswa->id)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $chartLabels = $dataPerBulan->map(fn($d) => \Carbon\Carbon::create()->month($d->bulan)->format('F'))->toArray();
        $chartData = $dataPerBulan->pluck('saldo')->toArray();

        return view('Student.dashboard', compact(
            'totalTabungan',
            'totalSetoran',
            'totalPenarikan',
            'transaksiTerakhir',
            'chartLabels',
            'chartData'
        ));
    }


    // Untuk siswa melihat riwayat tabungannya sendiri
    public function riwayatTabungan()
    {
        // Ambil siswa yang sedang login
        $siswa = Auth::guard('siswa')->user();

        // Ambil SEMUA data tabungan
        $tabungan = Tabungan::all();

        // Hitung saldo total untuk siswa yang sedang login
        $saldo = Tabungan::where('siswa_id', $siswa->id)
            ->selectRaw('SUM(CASE WHEN jenis_penarikan = "setoran" THEN jumlah ELSE -jumlah END) as saldo')
            ->value('saldo') ?? 0;

        // Simpan data riwayat tabungan siswa yang sedang login
        $riwayat = $siswa->tabungan()
            ->orderBy('tanggal', 'desc')
            ->get();


        return view('Student.riwayat', [
            'riwayat' => $riwayat,
            'saldo' => $saldo,
            'siswa' => $siswa,
            'semuaTabungan' => $tabungan,
        ]);
    }



    public function notifikasi()
    {
        $siswa = Auth::guard('siswa')->user();

        // Ambil notifikasi khusus untuk siswa yang login
        $notifikasis = notikasi::with(['guru', 'kelas'])
            ->where('siswa_id', $siswa->id)
            ->latest()
            ->get();

        return view('Student.notifikasi', compact('notifikasis'));
    }




    // public function riwayatTabungan()
    // {
    //     $siswa = Auth::guard('siswa')->user();
    //     $riwayat = $siswa->tabungan()->latest()->get();

    //     // Untuk debugging, lihat apakah data ada
    //     dd($riwayat); // Ini akan menampilkan isi $riwayat

    //     return view('Student.riwayat', compact('riwayat'));
    // }


    // public function riwayatTabungan()
    // {
    //     $siswa = Auth::guard('siswa')->user();
    //     $riwayat = $siswa->tabungan()->latest()->get();

    //     // Untuk debugging, lihat apakah data ada
    //     // dd($riwayat); // Ini akan menampilkan isi $riwayat

    //     return view('Student.riwayat', compact('riwayat'));
    // }






    /**
     * Display the login form for siswa.
     */
    public function showLoginFormSiswa()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('Student.dashboard');
        }

        return view('auth.SiswaLogin');
    }

    /**
     * Handle siswa login.
     */
    public function loginSiswa(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'nis' => 'required|string|min:10',
            'password' => 'required|string',
        ]);

        // Cek kredensial login
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            // Mengambil siswa yang sedang login
            $siswa = Auth::guard('siswa')->user();
            $siswa->is_active = true;
            $siswa->save();


            return redirect()->route('Student.dashboard');
        }

        // Kalau gagal login
        return back()->withErrors([
            'nis' => 'NIS atau password tidak cocok.',
        ]);
    }

    public function logoutSiswa(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();
        if ($siswa) {
            $siswa->is_active = false;
            $siswa->last_active_at = now();
            $siswa->save(); // Simpan perubahan
        }

        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.siswa.form');
    }
}
