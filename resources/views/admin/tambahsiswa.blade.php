@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white shadow-lg p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Tambah Akun Siswa</h2>

    @if($errors->any())
        <div class="mb-4 text-red-600 font-semibold">
            {{ $errors->first() }}
        </div>
    @endif

    @if(session('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.storesiswa') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nama Siswa</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" value="{{ old('name') }}">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="nis" class="block font-medium">NIS</label>
            <input type="text" name="nis" id="nis" class="w-full border border-gray-300 p-2 rounded" value="{{ old('nis') }}">
            @error('nis') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="kelas" class="block font-medium">kelas</label>
            <input type="kelas" name="kelas" id="kelas" class="w-full border border-gray-300 p-2 rounded" value="{{ old('email') }}">
            @error('kelas') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" value="{{ old('email') }}">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
            Tambah Siswa
        </button>
    </form>
</div>
@endsection
