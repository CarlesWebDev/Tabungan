@extends('layouts.app')

@section('content')
    {{-- Header Dashboard --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-5">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Welcome {{ Auth::user()->name }}</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
        {{-- Siswa --}}
        <div class="flex items-center p-6 bg-blue-50 rounded-xl shadow-md">
            <div class="p-4 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-700">Jumlah Siswa</h3>
                <p class="text-2xl font-bold text-blue-600">{{ $siswas->count() }}</p>
            </div>
        </div>

        {{-- Guru --}}
        <div class="flex items-center p-6 bg-green-50 rounded-xl shadow-md">
            <div class="p-4 bg-green-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-10 h-10 text-green-600">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-700">Jumlah Guru</h3>
                <p class="text-2xl font-bold text-green-600">{{ $gurus->count() }}</p>
            </div>
        </div>

        {{-- Saldo Tabungan seluruh Kelas --}}
        <div class="flex items-center p-6 bg-yellow-50 rounded-xl shadow-md">
            <div class="p-4 bg-yellow-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-10 h-10 text-yellow-600">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-700">Saldo Tabungan seluruh kelas</h3>
                <p class="text-2xl font-bold text-yellow-600">
                    Rp{{ number_format($totalTabungan, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- Akun Dikelola --}}
        <div class="flex items-center p-6 bg-red-50 rounded-xl shadow-md">
            <div class="p-4 bg-red-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-10 h-10 text-red-600">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-700">Akun Dikelola</h3>
                <p class="text-2xl font-bold text-red-600">{{ $gurus->count() + $siswas->count() }}</p>
            </div>
        </div>
    </div>





    {{-- Rata-rata tabungan per kelas(info) --}}
    <div class="mt-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Statistik Tabungan per Kelas</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($totalTabunganPerKelas as $kelas => $total)
                <div class="bg-white shadow p-6 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-700 mb-1">Kelas {{ $kelas }}</h3>
                    <p class="text-sm text-gray-500 mb-1">Wali Kelas:
                        <span class="font-medium text-gray-800">
                            {{ $waliKelas[$kelas] ?? 'Tidak ada wali kelas' }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500 mb-1">Jumlah siswa aktif:
                        <span class="font-medium text-gray-800">{{ $jumlahSiswaPerKelas[$kelas] ?? 0 }}</span>
                    </p>
                    <p class="text-sm text-gray-500 mb-1">Jumlah transaksi:
                        <span class="font-medium text-gray-800">{{ $jumlahTransaksiPerKelas[$kelas] ?? 0 }}</span>
                    </p>
                    <p class="text-base font-bold text-green-600">Total Tabungan:
                        Rp{{ number_format($total, 0, ',', '.') }}
                    </p>
                    <p class="text-base text-blue-600 font-semibold">Total Setoran:
                        Rp{{ number_format($totalSetoranPerKelas[$kelas] ?? 0, 0, ',', '.') }}
                    </p>
                    <p class="text-base text-red-600 font-semibold">Total Penarikan:
                        Rp{{ number_format($totalPenarikanPerKelas[$kelas] ?? 0, 0, ',', '.') }}
                    </p>
                    <p class="text-base font-semibold text-gray-700">Rata-rata Tabungan (per Kelas):
                        Rp{{ number_format($rataRataPerKelas[$kelas] ?? 0, 0, ',', '.') }}
                    </p>

                <div class="mt-4">
                    <h3 class="text-sm font-semibold text-gray-700 mb-1">Detail Setoran per Siswa:</h3>
                    <ul class="space-y-1">
                        @forelse($setoranDetailsByKelas[$kelas] ?? [] as $siswa)
                            <li class="text-sm text-gray-800">
                                • {{ $siswa['nama'] }}
                                <span class="text-green-600 font-medium">
                                    (Total: Rp{{ number_format($siswa['total'], 0, ',', '.') }},
                                    {{ $siswa['count'] }}x transaksi:
                                    {{ $siswa['rincian'] }})
                                </span>
                            </li>
                        @empty
                            <li class="text-sm text-gray-500">Belum ada setoran</li>
                        @endforelse
                    </ul>

                    <h3 class="text-sm font-semibold text-gray-700 mt-3 mb-1">Detail Penarikan per Siswa:</h3>
                    <ul class="space-y-1">
                        @forelse($penarikanDetailsByKelas[$kelas] ?? [] as $siswa)
                            <li class="text-sm text-gray-800">
                                • {{ $siswa['nama'] }}
                                <span class="text-red-600 font-medium">
                                    (Total: Rp{{ number_format($siswa['total'], 0, ',', '.') }},
                                    {{ $siswa['count'] }}x transaksi:
                                    {{ $siswa['rincian'] }})
                                </span>
                            </li>

                        @empty
                            <li class="text-sm text-gray-500">Belum ada penarikan</li>
                        @endforelse
                    </ul>
                </div>

                </div>
            @endforeach
        </div>
    </div>

@endsection