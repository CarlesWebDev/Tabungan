@extends('layouts.appguru') {{-- Ganti dengan layout yang kamu pakai --}}

@section('content')
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-xl font-bold mb-4">Tambah Tabungan</h2>

        <form action="{{ route('Teacher.storetabungan') }}" method="POST">
            @csrf

            {{-- Dropdown untuk memilih siswa --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <select name="siswa_id" class="w-full border rounded-lg p-2" required>
                    <option value="">Pilih Siswa</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Input Nama Guru --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Guru</label>
                <input type="text" name="nama_guru" class="w-full border rounded-lg p-2"
                    value="{{ Auth::guard('guru')->user()->name }}" readonly>
            </div>

            {{-- Input Tanggal --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Dropdown Jenis Transaksi --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jenis Transaksi</label>
                <select name="jenis_penarikan" class="w-full border rounded-lg p-2" required>
                    <option value="setoran">Setoran</option>
                    <option value="penarikan">Penarikan</option>
                </select>
            </div>

            {{-- Input Jumlah --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Input Keterangan --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Tombol Simpan --}}
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
        </form>
    </div>
@endsection