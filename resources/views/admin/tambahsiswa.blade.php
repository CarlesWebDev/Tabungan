@extends('layouts.app')

@section('content')
    <div class="max-w-full mx-auto my-8">
        <div class="bg-white rounded-xl  overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
                <h2 class="text-2xl font-semibold">Tambah Akun Siswa Baru</h2>
                <p class="text-blue-100">Isi formulir berikut untuk menambahkan akun siswa baru</p>
            </div>

            <div class="p-8">
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                        <div class="font-semibold">{{ $errors->first() }}</div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700">
                        <div class="font-semibold">{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('admin.storesiswa') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Student Information -->
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Siswa</label>
                                <input type="text" name="name" id="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('name') }}" required>
                                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Siswa (NIS)</label>
                                <input type="text" name="nis" id="nis"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('nis') }}" required>
                                @error('nis') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                                <select name="kelas_id" id="kelas_id"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                                            Kelas {{ $kelasItem->tingkat }} - {{ $kelasItem->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="space-y-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    value="{{ old('email') }}" required>
                                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input type="password" name="password" id="password"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    required>
                                <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter</p>
                                @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
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