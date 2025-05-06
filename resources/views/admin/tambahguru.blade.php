@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white  p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Tambah Akun Guru</h2>

    @if(session('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.storeguru') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nama Guru</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" value="{{ old('name') }}">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="nip" class="block font-medium">NIP</label>
            <input type="text" name="nip" id="nip" class="w-full border border-gray-300 p-2 rounded" value="{{ old('nip') }}">
            @error('nip') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
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

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
            Tambah Guru
        </button>
    </form>
</div>
@endsection
