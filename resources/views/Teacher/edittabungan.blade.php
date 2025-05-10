@extends('layouts.appguru')

@section('content')
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-xl font-bold mb-4">Edit Transaksi</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('Teacher.updatetabungan', $tabungan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <select name="siswa_id" class="w-full border rounded-lg p-2" required>
                    <option value="">Pilih Siswa</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $siswa->id == $tabungan->siswa_id ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Guru</label>
                <input type="text" name="nama_guru" class="w-full border rounded-lg p-2" value="{{ $tabungan->nama_guru }}"
                    readonly>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border rounded-lg p-2" value="{{ $tabungan->tanggal }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jenis Transaksi</label>
                <select name="jenis_penarikan" class="w-full border rounded-lg p-2" required>
                    <option value="setoran" {{ $tabungan->jenis_penarikan == 'setoran' ? 'selected' : '' }}>Setoran</option>
                    <option value="penarikan" {{ $tabungan->jenis_penarikan == 'penarikan' ? 'selected' : '' }}>Penarikan
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border rounded-lg p-2" value="{{ $tabungan->jumlah }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border rounded-lg p-2"
                    value="{{ $tabungan->keterangan }}" required>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Update</button>
        </form>
    </div>
@endsection