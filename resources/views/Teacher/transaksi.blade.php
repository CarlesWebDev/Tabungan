@extends('layouts.appguru')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
            <h1 class="text-2xl md:text-3xl font-semibold text-gray-800">Data Transaksi Tabungan</h1>
            <a href="{{ route('Teacher.tambahtabungan') }}"
                class="w-full md:w-auto px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 transition-all text-center">
                + Tambah Transaksi
            </a>
        </div>

        {{-- Form Pencarian --}}
        <form method="GET" action="{{ route('Teacher.transaksi') }}" class="mb-6">
            <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3 items-stretch">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama siswa..."
                    class="flex-1 min-w-[180px] px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="flex-1 min-w-[180px] px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition w-full sm:w-auto">
                    Cari
                </button>

                <a href="{{ route('Teacher.transaksi') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition w-full sm:w-auto text-center">
                    Reset
                </a>
            </div>
        </form>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Data --}}
        <div class="overflow-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-xs text-gray-600 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3 text-left whitespace-nowrap">No</th>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Nama Siswa</th>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Nama Guru</th>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Tanggal</th>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Jenis</th>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Jumlah</th>
                        <th class="px-6 py-3 text-left whitespace-nowrap">Keterangan</th>
                        <th class="px-6 py-3 text-center whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($tabungan as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $item->nama_siswa }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $item->nama_guru }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm capitalize text-gray-700 whitespace-nowrap">
                                {{ $item->jenis_penarikan }}
                            </td>
                            <td
                                class="px-6 py-4 text-sm font-semibold whitespace-nowrap
                                                {{ $item->jenis_penarikan == 'penarikan' ? 'text-red-700' : 'text-green-700' }}">
                                Rp{{ number_format($item->jumlah, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $item->keterangan }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <div class="flex justify-center gap-2 flex-wrap">
                                    <a href="{{ route('Teacher.edittabungan', $item->id) }}"
                                        class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded hover:bg-blue-200 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('Teacher.hapustabungan', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus transaksi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-100 text-red-700 text-xs rounded hover:bg-red-200 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-6 text-center text-sm text-gray-500">
                                Belum ada data transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection