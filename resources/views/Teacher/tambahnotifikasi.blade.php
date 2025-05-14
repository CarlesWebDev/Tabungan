@extends('layouts.appguru')

@section('content')
    <div class="max-w-2xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-semibold mb-4">Kirim Notifikasi ke Siswa</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('Teacher.storeNotifikasi') }}" method="POST" class="space-y-4">
            @csrf

        <div>
            <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-1">
                Pilih Siswa
            </label>
            <select name="siswa_id[]" id="siswa_id" multiple required
                class="tom-select block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @forelse($siswas as $siswa)
                    <option value="{{ $siswa->id }}">
                        {{ $siswa->name }} ({{ $siswa->kelas->tingkat ?? '-' }}{{ $siswa->kelas->nama_kelas ?? '-' }})
                    </option>
                @empty
                    <option value="" disabled>Data siswa tidak tersedia</option>
                @endforelse
            </select>
        </div>


            <div>
                <label for="notikasi" class="block text-sm font-medium text-gray-700">Pesan Notifikasi</label>
                <textarea name="notikasi" id="notikasi" rows="4" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Kirim
                </button>
            </div>
        </form>
    </div>
@endsection