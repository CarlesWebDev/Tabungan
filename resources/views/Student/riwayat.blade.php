@extends('layouts.appsiswa')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Tabungan</h2>

        @if(isset($message))
            <p class="text-red-500 font-medium">{{ $message }}</p>
        @else
            <h2 class="text-xl font-bold text-gray-700 mb-4">Riwayat Tabungan: {{ $siswa->name }}</h2>

            <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
                <table class="table-auto w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-3 text-gray-700">Nama Siswa</th>
                            <th class="border px-4 py-3 text-gray-700">Tanggal</th>
                            <th class="border px-4 py-3 text-gray-700">Jenis</th>
                            <th class="border px-4 py-3 text-gray-700">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-3">{{ $siswa->name }}</td>
                                <td class="border px-4 py-3">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="border px-4 py-3">{{ ucfirst($item->jenis_penarikan) }}</td>
                                <td class="border px-4 py-3">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection