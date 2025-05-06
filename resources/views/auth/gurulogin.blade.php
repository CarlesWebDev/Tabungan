@extends('layouts.login_layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center  px-4">
        <div class="grid md:grid-cols-2 gap-4 max-w-6xl w-full bg-white rounded-xl overflow-hidden ">

            <!-- Kolom Gambar -->
            <div class="hidden md:flex items-center justify-center p-6 ">
                <img src="https://rozzyna.uschoolonline.com/Public/images/Rozzyna_Login_bg.png"
                    class="w-full max-w-md object-contain" alt="login img" />
            </div>

            <!-- Kolom Form -->
            <div class="flex flex-col justify-center p-8">
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif

                <h3 class="text-3xl font-semibold text-slate-900 mb-2">Sign in <span class="text-blue-600">Guru</span></h3>
                <p class="text-sm text-slate-500 mb-6">
                    Masuk ke akun guru Anda dan pantau tabungan siswa dengan mudah.
                </p>

                <form method="POST" action="{{ route('login.guru') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="nip" class="block text-sm font-medium text-slate-800 mb-1">NIP</label>
                        <input id="nip" name="nip" type="text" required
                            class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none"
                            placeholder="Masukkan NIP" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-800 mb-1">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-3 text-sm border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none"
                            placeholder="Masukkan password" />
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full py-3 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                            Login
                        </button>
                    </div>
                </form>

                <div class="text-sm mt-4">
                    <p class="mb-1">Belum punya akun?
                        <a href="{{ route('register.guru.form') }}" class="text-blue-600 hover:underline">Daftar sebagai
                            guru</a>
                    </p>
                    <p class="mb-1">Sebagai Siswa?
                        <a href="{{ route('login.siswa') }}" class="text-blue-600 hover:underline">Masuk disini</a>
                    </p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('landingpage') }}"
                        class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection