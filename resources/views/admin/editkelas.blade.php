@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl  overflow-hidden p-6 space-y-6">
            <!-- Header Section -->
            <div class="border-b border-gray-200 pb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">Edit Data Kelas</h2>
                        <p class="text-gray-600 mt-1">Perbarui informasi kelas {{ $kelas->nama_kelas }}</p>
                    </div>
                    <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                        ID: {{ $kelas->id }}
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form action="{{ route('admin.updateKelas', $kelas->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Kelas Field -->
                <div>
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </div>
                        <input type="text" name="nama_kelas" id="nama_kelas"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 px-4 py-3 sm:text-sm border-gray-300 rounded-lg border"
                            placeholder="Contoh: XII RPL 1"
                            value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                    </div>
                    @error('nama_kelas')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jurusan and Tingkat Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Jurusan Field -->
                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                        <div class="mt-1">
                            <select name="jurusan" id="jurusan"
                                class="focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-3 sm:text-sm border-gray-300 rounded-lg border"
                                required>
                                <option value="RPL" {{ old('jurusan', $kelas->jurusan) == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                <option value="Sipil" {{ old('jurusan', $kelas->jurusan) == 'Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                                <option value="Listrik" {{ old('jurusan', $kelas->jurusan) == 'Listrik' ? 'selected' : '' }}>Teknik Listrik</option>
                                <option value="Mesin" {{ old('jurusan', $kelas->jurusan) == 'Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
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
                                <option value="X" {{ old('tingkat', $kelas->tingkat) == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ old('tingkat', $kelas->tingkat) == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ old('tingkat', $kelas->tingkat) == 'XII' ? 'selected' : '' }}>XII</option>
                                <option value="XIII" {{ old('tingkat', $kelas->tingkat) == 'XIII' ? 'selected' : '' }}>XIII</option>
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
                                <option value="{{ $guru->id }}" {{ old('guru_id', $kelas->guru_id) == $guru->id ? 'selected' : '' }}>
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
                <div class="flex justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.Kelas') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.Kelas') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Update Kelas
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection