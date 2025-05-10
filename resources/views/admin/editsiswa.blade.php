@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Akun Siswa</h2>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('admin.updatesiswa', $siswa->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-medium">Nama Siswa</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" value="{{ old('name', $siswa->name) }}">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="nis" class="block font-medium">NIS</label>
                <input type="text" name="nis" id="nis" class="w-full border border-gray-300 p-2 rounded" value="{{ old('nis', $siswa->nis) }}">
                @error('nis') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" value="{{ old('email', $siswa->email) }}">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="kelas_id" class="block font-medium">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="w-full border border-gray-300 p-2 rounded" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ old('kelas_id', $siswa->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block font-medium">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded">
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Update Siswa
            </button>
        </form>
    </div>
@endsection
