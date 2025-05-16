@extends('layouts.login_layout')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 py-12 ">
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl w-full bg-white  rounded-xl overflow-hidden">


            <div class="flex items-center justify-center  p-8">
                <img src="https://readymadeui.com/login-image.webp" class="w-full max-w-sm object-contain"
                    alt="Login Illustration">
            </div>


            <div class="p-8 max-w-md w-full mx-auto flex flex-col justify-center">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.admin') }}" class="space-y-6">
                    @csrf
                    <div class="mb-10">
                        <h3 class="text-3xl font-bold text-slate-900">
                            Sign in <span class="text-blue-600">Admin</span>
                        </h3>
                        <p class="text-slate-500 text-sm mt-2">Login to your account to manage the system.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input name="email" type="email" required value="{{ old('email') }}"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-blue-600"
                            placeholder="Enter your email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                        <input name="password" type="password" required
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 text-sm focus:outline-blue-600"
                            placeholder="Enter your password">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-sm text-slate-600">
                            <input type="checkbox" name="remember"
                                class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded">
                            Remember me
                        </label>
                        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot your password?</a>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all font-medium shadow">
                            Sign in
                        </button>
                        </p>
                    </div>
                </form>



                 <div class="flex justify-end mt-4">
                    <a href="{{ route('landingpage') }}"
                        class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection