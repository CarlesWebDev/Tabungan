<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tabungan;


class SiswaController extends Controller
{



    // Untuk siswa melihat riwayat tabungannya sendiri
    // app/Http/Controllers/SiswaController.php

public function riwayatTabungan()
{
    // Ambil siswa yang sedang login
    $siswa = Auth::guard('siswa')->user();
    // dd($siswa); // Periksa informasi siswa yang login, terutama 'id' nya

    // Ambil SEMUA data tabungan (untuk debugging, lihat apakah ada data)
    $tabungan = Tabungan::all();
    // dd($tabungan); // Periksa semua data tabungan

    // Hitung saldo total untuk siswa yang sedang login
    $saldo = Tabungan::where('siswa_id', $siswa->id)
        ->selectRaw('SUM(CASE WHEN jenis_penarikan = "setoran" THEN jumlah ELSE -jumlah END) as saldo')
        ->value('saldo') ?? 0;
    // dd($saldo); // Periksa saldo

    // Simpan data riwayat tabungan siswa yang sedang login
    $riwayat = $siswa->tabungan()
        ->orderBy('tanggal', 'desc')
        ->get();
    // dd($riwayat); // Periksa data riwayat tabungan spesifik untuk siswa

    return view('Student.riwayat', [
        'riwayat' => $riwayat,
        'saldo' => $saldo,
        'siswa' => $siswa,
        'semuaTabungan' => $tabungan,
    ]);
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
