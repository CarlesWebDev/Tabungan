@extends('layouts.appsiswa')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Riwayat Tabungan</h1>
            <p class="text-gray-600">Catatan transaksi tabungan Anda</p>
        </div>

        @if(isset($message))
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            </div>
        @elseif($riwayat->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-3" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-gray-600">Belum ada data tabungan</p>
            </div>
        @else
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="p-5 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Riwayat Transaksi</h2>
                            <p class="text-sm text-gray-500">Siswa: {{ $siswa->name }}</p>
                        </div>
                        <div class="flex flex-col">

                            <div class="bg-blue-50 px-3 py-1 mb-3 rounded-full text-sm font-medium text-blue-700">
                                Total Transaksi: {{ $riwayat->count() }}
                            </div>
                            <div class="bg-blue-50 px-3 py-1  rounded-full mb-3 text-sm font-medium text-blue-700">
                                Total Penarikan: {{ $riwayat->where('jenis_penarikan', 'penarikan')->count() }}
                            </div>
                            <div class="bg-blue-50 px-3 py-1  rounded-full text-sm font-medium text-blue-700">
                                Total Pemasukan: {{ $riwayat->where('jenis_penarikan', 'setoran')->count() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Keterangan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($riwayat as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('D MMMM YYYY') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full {{ $item->jenis_penarikan == 'setoran' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($item->jenis_penarikan) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-semibold {{ $item->jenis_penarikan == 'setoran' ? 'text-green-600' : 'text-red-600' }}">
                                        Rp{{ number_format($item->jumlah, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection