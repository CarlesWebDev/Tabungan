@extends('layouts.app')

@section('content')
    <div class="max-w-full mx-auto my-12 bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Header Section -->
        <div class="bg-indigo-700 px-6 py-4">
            <h2 class="text-2xl font-semibold text-white">Edit Teacher Account</h2>
            <p class="text-indigo-200">Update the teacher's information below</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mx-6 mt-4">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Form Section -->
        <form action="{{ route('admin.updateguru', $guru->id) }}" method="POST" class="px-8 py-6">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Teacher Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200
                              @error('name') border-red-500 @enderror" value="{{ old('name', $guru->name) }}"
                    placeholder="Enter full name">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIP Field -->
            <div class="mb-6">
                <label for="nip" class="block text-gray-700 font-medium mb-2">NIP</label>
                <input type="text" name="nip" id="nip" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200
                              @error('nip') border-red-500 @enderror" value="{{ old('nip', $guru->nip) }}"
                    placeholder="Enter teacher ID number">
                @error('nip')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200
                              @error('email') border-red-500 @enderror" value="{{ old('email', $guru->email) }}"
                    placeholder="Enter email address">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-8">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200
                                  @error('password') border-red-500 @enderror"
                        placeholder="Kosongkan jika tidak ingin mengubah">
                    <button type="button" onclick="togglePasswordVisibility()"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 hover:text-gray-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <p class="mt-1 text-sm text-gray-500">Minimum 8 characters</p>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.Users') }}"
                    class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center">
                    <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to List
                </a>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200">
                    Update Teacher
                </button>
            </div>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        }
    </script>
@endsection