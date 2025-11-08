@extends('layouts.app')

@section('content')
    <div class="max-w-full mx-auto my-8">
        <div class="bg-white rounded-xl overflow-hidden justify-between">
            <div class="bg-blue-200 px-6 py-5 mt-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold text-black">Tambah Akun Siswa Baru</h2>
                        <p class="text-black mt-1">Isi formulir berikut untuk menambahkan akun siswa baru</p>
                    </div>
                    <div class="bg-indigo-500 p-3 rounded-lg">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Z" />
                            <path d="M20 21a8 8 0 1 0-16 0" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="p-8">
                {{-- @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                        <div class="font-semibold">{{ $errors->first() }}</div>
                    </div>
                @endif --}}

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700">
                        <div class="font-semibold">{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('admin.storesiswa') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap
                                    Siswa</label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 transition
                                      {{ $errors->has('name')
                                          ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                          : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                    value="{{ old('name') }}">


                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Siswa
                                    (NIS)</label>
                                <input type="text" name="nis" id="nis"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                                    {{ $errors->has('nis') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                    value="{{ old('nis') }}">
                                @error('nis')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                                <select name="kelas_id" id="kelas_id"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 transition
                                    {{ $errors->has('kelas_id')
                                        ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                        : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}"
                                            {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                                            Kelas {{ $kelasItem->tingkat }} - {{ $kelasItem->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                    Email</label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                                     {{ $errors->has('email')
                                         ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                         : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <div class="relative">

                                    <input type="password" name="password" id="password"
                                        class="w-full  pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition
                                         {{ $errors->has('password')
                                             ? 'border-red-500 focus:ring-red-500 focus:border-red-500'
                                             : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}"
                                        minlength="8">

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

                                <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter</p>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Tambah Akun Siswa
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Pastikan data yang dimasukkan sudah benar sebelum disimpan</p>
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
