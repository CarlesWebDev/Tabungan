@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl  overflow-hidden p-6 space-y-6">
            <!-- Header Section -->
            <div class="border-b border-gray-200 pb-4">
                <h2 class="text-3xl font-bold text-gray-800">Tambah Kelas Baru</h2>
                <p class="text-gray-600 mt-1">Isi formulir berikut untuk menambahkan kelas baru ke sistem</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form Section -->
            <form action="{{ route('admin.storekelas') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Kelas Field -->
                <div>
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="nama_kelas" id="nama_kelas"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-3 sm:text-sm border-gray-300 rounded-lg border"
                            placeholder="Contoh: RPL 1" value="{{ old('nama_kelas') }}" required>
                    </div>
                    @error('nama_kelas')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jurusan Field -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                        <div class="mt-1">
                            <select name="jurusan" id="jurusan"
                                class="focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-3 sm:text-sm border-gray-300 rounded-lg border"
                                required>
                                <option value="">Pilih Jurusan</option>
                                <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak
                                </option>
                                <option value="Sipil" {{ old('jurusan') == 'MM' ? 'selected' : '' }}>Sipil</option>
                                <option value="Listrik" {{ old('jurusan') == 'AKL' ? 'selected' : '' }}>Listrik</option>
                                <option value="Mesin" {{ old('jurusan') == 'OTKP' ? 'selected' : '' }}>Mesin
                                </select>
                        </div>
                        @error('jurusan'))
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tingkat Field -->
                    <div>
                        <label for="tingkat" class="block text-sm font-medium text-gray-700 mb-1">Tingkat</label>
                        <div class="mt-1">
                            <select name="tingkat" id="tingkat"
                                class="focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-3 sm:text-sm border-gray-300 rounded-lg border"
                                required>
                                <option value="">Pilih Tingkat</option>
                                <option value="X" {{ old('tingkat') == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ old('tingkat') == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>XII</option>
                                <option value="XIII" {{ old('tingkat') == 'XIII' ? 'selected' : '' }}>XIII</option>
                            </select>
                        </div>
                        @error('tingkat'))
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Guru Field -->
                <div>
                    <label for="guru_id" class="block text-sm font-medium text-gray-700 mb-1">Wali Kelas</label>
                    <div class="mt-1">
                        <select name="guru_id" id="guru_id"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-3 sm:text-sm border-gray-300 rounded-lg border"
                            required>
                            <option value="">-- Pilih Wali Kelas --</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->name }} {{ $guru->kelas->count() > 0 ? ' (Sudah Menjadi wali kelas)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('guru_id'))
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('admin.Kelas') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Simpan Kelas
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
