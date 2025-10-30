@extends('layouts.login_layout')


@section('content')
    <div class="min-h-screen flex items-center justify-center  px-6 py-12">
        <div class="max-w-full w-full bg-white rounded-2xl  overflow-hidden">
            <div class="grid md:grid-cols-5">
                <!-- Left Side - Accent Column -->
                <div class="hidden md:block md:col-span-2 bg-blue-600 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-700/90 to-indigo-900/90 z-10"></div>
                    <div class="absolute inset-0 opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" class="w-full h-full">
                            <path d="M0 0h1000v1000H0z" fill="none" />
                            <path fill="#FFF"
                                d="M275 411c-1-6-8-12-14-12h-22v-11c0-8-6-14-14-14h-18c-8 0-14 6-14 14v11h-22c-6 0-13 6-14 12l-19 89c-1 5 1 12 6 16l14 13c6 5 11 5 18 2l22-9c6-3 7-3 13 0l22 9c7 3 12 3 18-2l14-13c5-4 7-11 6-16l-16-89zM150 547v64c0 5 5 10 10 10h50c5 0 10-5 10-10v-64c0-5-5-10-10-10h-50c-5 0-10 5-10 10z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M290 531v64c0 5 5 10 10 10h50c5 0 10-5 10-10v-64c0-5-5-10-10-10h-50c-5 0-10 5-10 10z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M220 631v114c0 8 7 15 15 15h40c8 0 15-7 15-15V631c0-8-7-15-15-15h-40c-8 0-17 7-15 15z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M515 641c-1-6-8-12-14-12h-22v-11c0-8-6-14-14-14h-18c-8 0-14 6-14 14v11h-22c-6 0-13 6-14 12l-19 89c-1 5 1 12 6 16l14 13c6 5 11 5 18 2l22-9c6-3 7-3 13 0l22 9c7 3 12 3 18-2l14-13c5-4 7-11 6-16l-16-89zM390 777v64c0 5 5 10 10 10h50c5 0 10-5 10-10v-64c0-5-5-10-10-10h-50c-5 0-10 5-10 10z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M530 761v64c0 5 5 10 10 10h50c5 0 10-5 10-10v-64c0-5-5-10-10-10h-50c-5 0-10 5-10 10z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M460 861v114c0 8 7 15 15 15h40c8 0 15-7 15-15V861c0-8-7-15-15-15h-40c-8 0-17 7-15 15z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M735 411c-1-6-8-12-14-12h-22v-11c0-8-6-14-14-14h-18c-8 0-14 6-14 14v11h-22c-6 0-13 6-14 12l-19 89c-1 5 1 12 6 16l14 13c6 5 11 5 18 2l22-9c6-3 7-3 13 0l22 9c7 3 12 3 18-2l14-13c5-4 7-11 6-16l-16-89zM610 547v64c0 5 5 10 10 10h50c5 0 10-5 10-10v-64c0-5-5-10-10-10h-50c-5 0-10 5-10 10z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M750 531v64c0 5 5 10 10 10h50c5 0 10-5 10-10v-64c0-5-5-10-10-10h-50c-5 0-10 5-10 10z"
                                opacity=".5" />
                            <path fill="#FFF"
                                d="M680 631v114c0 8 7 15 15 15h40c8 0 15-7 15-15V631c0-8-7-15-15-15h-40c-8 0-17 7-15 15z"
                                opacity=".5" />
                        </svg>
                    </div>
                    <div class="absolute inset-0 flex flex-col justify-center z-20 p-8">
                        <div class="w-16 h-16 mb-6 rounded-full bg-white/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Daftar Akun Guru</h3>
                        <p class="text-blue-100 mb-8 text-sm">Pastikan data yang diisi sudah benar untuk proses verifikasi
                            yang lebih cepat</p>

                        <div class="space-y-4 text-white text-sm">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-200" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Akses Dashboard Guru</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-200" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Kelola Tabungan Siswa</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-200" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Laporan & Analisis</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Form Column -->
                <div class="p-8 md:col-span-3">
                    <div class="flex items-center mb-6 justify-center md:justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10 sm:w-8 sm:h-8 md:w-8 md:h-8 text-blue-500 flex-shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        <span class="ml-2 text-lg sm:text-xl md:text-2xl text-blue-500 font-bold">EduSavings</span>
                    </div>


                    <h2 class="text-2xl font-bold mb-6 text-gray-900">Registrasi Guru</h2>

                    @if (session('success'))
                        <div
                            class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-6 flex items-start">
                            <div class="mr-3 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-6">
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">Mohon periksa formulir kembali</span>
                            </div>
                            <ul class="list-disc pl-5 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <form action="{{ route('register.guru') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-5">
                        @csrf

                        <div class="mb-4">
                            <!-- Label -->
                            <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">
                                Nomor Induk Pegawai (NIP)
                            </label>

                            <!-- Input Wrapper -->
                            <div class="relative">
                                <!-- Icon -->
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                </div>

                                <!-- Input -->
                                <input type="text" name="nip" id="nip" value="{{ old('nip') }}"
                                    minlength="18"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900
                                     {{ $errors->has('nip') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                    placeholder="Masukkan 18 digit NIP" />
                            </div>
                            @error('nip')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900
                                    {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900
                                    {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}""
                                    placeholder="email@example.com">
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <!-- Input Wrapper -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata
                                    Sandi</label>
                                <div class="relative">
                                    <!-- Icon kunci -->
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>

                                    <!-- Input password -->
                                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                                        class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900
                                        {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                        placeholder="Minimal 8 karakter" />

                                    <!-- Tombol tampilkan/sembunyikan password -->
                                    <button type="button" onclick="togglePasswordVisibility()"
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-600 hover:text-gray-700">
                                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Hint -->
                            <div class="text-xs text-gray-500 mt-1">
                                Minimal 8 karakter dengan kombinasi huruf dan angka
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="mb-6">
                            <label for="verification_file" class="block text-sm font-medium text-gray-700 mb-2">
                                File Verifikasi Status Guru
                            </label>

                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" />
                                    </svg>

                                    <div class="flex text-sm text-gray-600">
                                        <label for="verification_file"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Upload file</span>
                                            <input id="verification_file" name="verification_file" type="file"
                                                class="sr-only" accept=".pdf,.jpg,.jpeg,.png"
                                                onchange="previewFileName(event)">
                                        </label>
                                        <p class="pl-1">atau drag dan drop</p>
                                    </div>

                                    <!-- Nama file muncul di sini -->
                                    <p id="fileName" class="text-xs text-gray-700 mt-2"></p>

                                    <!-- Preview gambar -->
                                    <div id="imagePreview" class="mt-3 hidden">
                                        <img id="previewImg" class="mx-auto h-32 rounded-lg shadow-md border"
                                            alt="Preview">
                                    </div>

                                    <p class="text-xs text-gray-500">
                                        PDF, JPG, atau PNG (maks. 2MB)
                                    </p>
                                </div>
                            </div>

                            <p class="text-xs text-gray-500 mt-2">
                                *Upload SK, Surat Tugas, atau dokumen lain yang membuktikan status Anda sebagai guru
                            </p>
                            @error('verification_file')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <div class="mb-6">
                            <label for="verification_file" class="block text-sm font-medium text-gray-700 mb-2">
                                File Verifikasi Status Guru
                            </label>

                            <div @class([
                                'mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-lg transition-colors',
                                'border-gray-300' => !$errors->has('verification_file'),
                                'border-red-500 bg-red-50' => $errors->has('verification_file'),
                            ])>
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" />
                                    </svg>

                                    <div class="flex text-sm text-gray-600">
                                        <label for="verification_file"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                            <span>Upload file</span>
                                            <input id="verification_file" name="verification_file" type="file"
                                                class="sr-only" accept=".pdf,.jpg,.jpeg,.png"
                                                onchange="previewFileName(event)">
                                        </label>
                                        <p class="pl-1">atau drag dan drop</p>
                                    </div>


                                    {{-- nama File  --}}
                                    <p id="fileName" class="text-xs text-gray-700 mt-2"></p>

                                    <!-- Preview gambar -->
                                    <div id="imagePreview" class="mt-3 hidden">
                                        <img id="previewImg" class="mx-auto h-32 rounded-lg shadow-md border"
                                            alt="Preview">
                                    </div>

                                    <p class="text-xs text-gray-500">
                                        PDF, JPG, atau PNG (maks. 2MB)
                                    </p>
                                </div>
                            </div>

                            <p class="text-xs text-gray-500 mt-2">
                                *Upload SK, Surat Tugas, atau dokumen lain yang membuktikan status Anda sebagai guru
                            </p>


                            @error('verification_file')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>




                        <div class="pt-3">
                            <button type="submit"
                                class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                Daftar Akun
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun?
                            <a href="{{ route('login.guru.form') }}"
                                class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                Login di sini
                            </a>
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-200 text-center">
                        <a href="{{ route('landingpage') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    function previewFileName(event) {
        const file = event.target.files[0];
        const fileNameElement = document.getElementById('fileName');
        if (file) {
            fileNameElement.textContent = `File terpilih: ${file.name}`;
        } else {
            fileNameElement.textContent = '';
        }
    }


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
