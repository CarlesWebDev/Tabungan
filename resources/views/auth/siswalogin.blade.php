@extends('layouts.login_layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-6xl  rounded-2xl  overflow-hidden">
            <div class="grid md:grid-cols-2 gap-0">
                <!-- Image Column -->
                <div class="hidden md:flex items-center justify-center bg-gradient-to-br  p-10">
                    <div class="text-center">
                        <img src="https://siswa.erlanggaexam.com/assets/images/erlangga-exam-login-siswa-1.svg"
                            class="w-full max-w-md mx-auto object-contain" alt="Student Login Illustration" />
                        <div class="mt-8 text-white">
                            <h3 class="text-2xl text-blue-500 font-bold mb-2">Sistem Monitoring Tabungan Siswa</h3>
                            <p class="text-blue-500 text-lg">Pantau perkembangan tabungan Anda dengan mudah</p>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="flex flex-col justify-center p-10">
                    <div class="text-center md:text-left mb-8">
                        <div class="flex items-center justify-center md:justify-start mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="size-8 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                            <span class="ml-2 text-2xl font-bold text-blue-500">EduSavings</span>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Masuk Sebagai Siswa</h1>
                        <p class="text-gray-600">Gunakan kredensial Anda untuk mengakses dashboard siswa</p>
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

                    <form method="POST" action="{{ route('login.siswa') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Siswa
                                (NIS)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="nis" name="nis" type="text" required
                                    class="block w-full pl-10 pr-3 py-3 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan NIS Anda" />
                            </div>
                        </div>

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
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-600 hover:text-gray-700">
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

                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <div class="text-sm text-center text-gray-600">
                            <p class="mb-2">Sebagai Guru?</p>
                            <a href="{{ route('login.guru') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Masuk sebagai guru
                            </a>
                        </div>
                    </div>
                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <div class="text-sm text-center text-gray-600">
                            <p class="mb-2">Tidak Punya Akun?</p>
                            <a href="https://wa.me/6283807362506" class="font-medium text-blue-600 hover:text-blue-500">
                                Hubungi Admin Disini
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