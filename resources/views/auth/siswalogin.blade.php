@extends('layouts.login_layout')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="py-6 px-4">
            <div class="grid md:grid-cols-2 items-center gap-6 max-w-6xl w-full">

                <div class="max-md:mt-8">
                    <img src="https://png.pngtree.com/png-clipart/20230930/original/pngtree-student-login-blue-concept-icon-login-resource-infographic-vector-png-image_12919839.png"
                        class="w-full aspect-[71/50] max-md:w-4/5 mx-auto block object-cover" alt="login img" />
                </div>
                <!-- Kiri: Form -->
                <div class="p-6 max-w-md  max-md:mx-auto">

                    {{-- Error Message --}}
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.siswa') }}" class="space-y-6 w-full max-w-md mx-auto mt-4">
                        @csrf
                        <div class="mb-6">
                            <h3 class="text-3xl font-semibold text-slate-900">Sign in <span
                                    class="text-blue-600">Siswa</span></h3>
                            <p class="text-sm text-slate-500 mt-2">
                                Masuk ke akun siswa Anda dan pantau tabungan siswa dengan mudah.
                            </p>
                        </div>

                        <!-- NIS -->
                        <div>
                            <label for="nis" class="block text-sm font-medium text-slate-800 mb-2">NIS</label>
                            <input id="nis" name="nis" type="text" required
                                class="w-full px-4 py-3 text-sm text-slate-800 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                placeholder="Masukkan NIS" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-800 mb-2">Password</label>
                            <input id="password" name="password" type="password" required
                                class="w-full px-4 py-3 text-sm text-slate-800 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                placeholder="Masukkan password" />
                        </div>

                        <!-- Sign in Button -->
                        <div class="mt-8">
                            <button type="submit"
                                class="w-full py-3 text-white bg-blue-600 rounded-lg shadow-xl hover:bg-blue-700 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="flex mt-5 justify-start space-x-1 text-sm">
                        <span>Sebagai Guru?</span>
                        <a href="{{ route('login.guru') }}" class="text-blue-600 hover:underline">Masuk disini</a>
                    </div>


                    <div class="flex justify-end mt-6">
                        <a href="{{ route('landingpage') }}"
                            class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection