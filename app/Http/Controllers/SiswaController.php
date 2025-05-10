<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiswaController extends Controller
{
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
        // Pastikan siswa yang logout adalah siswa yang sedang login
        if ($siswa) {
            $siswa->is_active = false; // Set is_active ke false
            $siswa->last_active_atctive_at = now(); // Set last_active_at ke waktu sekarang
            $siswa->save(); // Simpan perubahan
        }

        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.siswa.form');
    }
}
