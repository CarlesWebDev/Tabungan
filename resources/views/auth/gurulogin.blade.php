@extends('layouts.login_layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-8">
        <div class="w-full max-w-6xl  rounded-xl  overflow-hidden">
            @if (session('success'))
                <div class="fixed top-5 right-5 z-50">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg"
                        role="alert">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-0">
                <!-- Image Column -->
                <div class="hidden md:flex items-center justify-center  p-8">
                    <div class="text-center w-full">
                        <img src="https://rozzyna.uschoolonline.com/Public/images/Rozzyna_Login_bg.png"
                            class="w-3/4 max-w-xs mx-auto object-contain" alt="Teacher Login Illustration" />
                        <div class="mt-8 text-white">
                            <h3 class="text-2xl text-blue-500 font-bold mb-2">Sistem Monitoring Tabungan Siswa</h3>
                            <p class="text-blue-500 text-base">Pantau dan kelola tabungan siswa dengan mudah dan efisien</p>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="flex flex-col justify-center p-8">
                    <div class="mb-8 text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="lucide lucide-piggy-bank h-9 w-9 text-blue-600"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2h0V5z" />
                                <path d="M2 9v1c0 1.1.9 2 2 2h1" />
                                <path d="M16 11h0" />
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-gray-800">EduSavings</span>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Masuk Sebagai Guru</h1>
                        <p class="text-gray-600">Gunakan kredensial Anda untuk mengakses dashboard</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="ml-2 text-sm text-red-700">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.guru') }}" class="space-y-6">
                        @csrf

                        {{-- NIP --}}
                        <div>
                            <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Pegawai
                                (NIP)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="nip" name="nip" type="text" required
                                    class="block w-full pl-10 pr-3 py-3 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan NIP Anda" />
                            </div>
                        </div>



                        {{-- password --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" required
                                    class="block w-full pl-10 pr-10 py-3 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan kata sandi Anda" />

                                <button type="button" onclick="togglePasswordVisibility()"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 hover:text-gray-700">
                                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <!-- Mata terbuka default -->
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                    Ingat saya
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                                    Lupa kata sandi?
                                </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                Masuk
                            </button>
                        </div>
                    </form>

                    <div class="mt-8 border-t border-gray-500 pt-6">
                        <div class="text-sm text-center text-gray-600 mb-4">
                            <p class="mb-2">Belum memiliki akun guru?</p>
                            <a href="{{ route('register.guru.form') }}"
                                class="font-medium text-blue-600 hover:text-blue-500">
                                Daftar akun baru
                            </a>
                        </div>

                        <div class="text-sm text-center">
                            <p class="text-gray-600">Atau masuk sebagai</p>
                            <a href="{{ route('login.siswa') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Siswa
                            </a>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('landingpage') }}"
                            class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        const isPassword = passwordField.type === 'password';
        passwordField.type = isPassword ? 'text' : 'password';

        if (isPassword) {
            // Mata tertutup
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.972 9.972 0 012.166-3.568M6.261 6.261A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.972 9.972 0 01-4.107 5.148M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3l18 18" />
            `;
        } else {
            // Mata terbuka
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>