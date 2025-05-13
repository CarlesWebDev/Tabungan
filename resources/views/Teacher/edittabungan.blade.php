@extends('layouts.appguru')

@section('content')
    <div class="max-w-2xl mx-auto my-8 bg-white rounded-xl  overflow-hidden p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Transaksi Tabungan</h2>
            <a href="{{ url()->previous() }}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Error:</span> {{ $errors->first() }}
                </div>
            </div>
        @endif

        {{-- Edit Form --}}
        <form action="{{ route('Teacher.updatetabungan', $tabungan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Student Selection --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                <select name="siswa_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    required>
                    <option value="">Pilih Siswa</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $siswa->id == $tabungan->siswa_id ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Teacher Name --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Guru</label>
                <input type="text" name="nama_guru"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed"
                    value="{{ $tabungan->nama_guru }}" readonly>
            </div>

            {{-- Transaction Date --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Transaksi</label>
                <input type="date" name="tanggal"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    value="{{ old('tanggal', $tabungan->tanggal) }}" required>
            </div>

            {{-- Transaction Type --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Transaksi</label>
                <select name="jenis_penarikan"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    required>
                    <option value="setoran" {{ $tabungan->jenis_penarikan == 'setoran' ? 'selected' : '' }}>Setoran
                    </option>
                    <option value="penarikan" {{ $tabungan->jenis_penarikan == 'penarikan' ? 'selected' : '' }}>Penarikan
                    </option>
                </select>
            </div>

            {{-- Amount --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah (Rp)</label>
                <input type="number" name="jumlah"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    value="{{ $tabungan->jumlah }}" required>
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <input type="text" name="keterangan"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    value="{{ $tabungan->keterangan }}" required>
            </div>

            {{-- Form Actions --}}
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ url()->previous() }}"
                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection