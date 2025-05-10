@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-6 space-y-10">
            <h2 class="text-2xl font-extrabold">Tambah Kelas</h2>

            @if(session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Tambah Kelas -->
            <form action="{{ route('admin.storekelas') }}" method="POST">
                @csrf
                <!-- Nama Kelas -->
                <div class="mb-6">
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('nama_kelas') }}" required>
                    @error('nama_kelas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jurusan -->
                <div class="mb-6">
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('jurusan') }}" required>
                    @error('jurusan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tingkat -->
                <div class="mb-6">
                    <label for="tingkat" class="block text-sm font-medium text-gray-700">Tingkat</label>
                    <input type="text" name="tingkat" id="tingkat"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('tingkat') }}" required>
                    @error('tingkat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Guru -->
            <!-- Guru -->
            <div class="mb-6">
                <label for="guru_id" class="block text-sm font-medium text-gray-700">Pilih Guru</label>
                <select name="guru_id" id="guru_id"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                    <option value="">-- Pilih Guru --</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                            {{ $guru->name }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition w-full text-center">
                        Tambah Kelas
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection