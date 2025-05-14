@extends('layouts.app')

@section('content')
    {{-- Header Dashboard --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-5 mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Welcome {{ Auth::user()->name }}</h1>
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Student Count --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center p-6">
                <div class="p-3 bg-blue-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-blue-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-md font-medium text-gray-500">Jumlah Murid</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $siswas->count() }}</p>
                </div>
            </div>
        </div>



        {{-- Jumlah Guru --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center p-6">
                <div class="p-3 bg-green-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 text-green-600">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-md font-medium text-gray-500">Jumlah Guru</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $gurus->count() }}</p>
                </div>
            </div>
        </div>

        {{-- Total Savings --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center p-6">
                <div class="p-3 bg-yellow-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-md font-medium text-gray-500">Total Tabungan</h3>
                    <p class="text-2xl break-words font-bold text-gray-800">
                        Rp{{ number_format($totalTabungan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        {{-- Managed Accounts --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center p-6">
                <div class="p-3 bg-purple-50 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 text-purple-600">
                        <path fill-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-md font-medium text-gray-500">Akun di kelola</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $gurus->count() + $siswas->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Class Savings Statistics --}}
    <div class="mt-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Statistik Tabungan Kelas</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($totalTabunganPerKelas as $kelas => $total)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    {{-- Class Header --}}
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">Kelas {{ $kelas }}</h3>
                        <p class="text-sm text-gray-500 mt-1">
                            WaliKelas: <span class="font-medium">{{ $waliKelas[$kelas] ?? 'Not assigned' }}</span>
                        </p>
                    </div>

                    {{-- Statistik --}}
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-500">Murid Aktif</p>
                                <p class="font-medium text-gray-800">{{ $jumlahSiswaPerKelas[$kelas] ?? 0 }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Jumlah transaksi</p>
                                <p class="font-medium text-gray-800">{{ $jumlahTransaksiPerKelas[$kelas] ?? 0 }}</p>
                            </div>
                        </div>

                        {{-- Jumlah --}}
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Total Tabungan</span>
                                <span class="font-bold text-green-600">Rp{{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Total setoran</span>
                                <span
                                    class="font-medium text-blue-600">Rp{{ number_format($totalSetoranPerKelas[$kelas] ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-500">Total Penarikan</span>
                                <span
                                    class="font-medium text-red-600">Rp{{ number_format($totalPenarikanPerKelas[$kelas] ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                                <span class="text-sm font-medium text-gray-500">Rata-Rata Tabungan</span>
                                <span
                                    class="font-medium text-gray-800">Rp{{ number_format($rataRataPerKelas[$kelas] ?? 0, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        {{-- Deposit Details --}}
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Detail Setoran:</h4>
                            <ul class="space-y-2">
                                @forelse($setoranDetailsByKelas[$kelas] ?? [] as $siswa)
                                    <li class="flex justify-between text-sm">
                                        <span class="text-gray-700">{{ $siswa['nama'] }}</span>
                                        <div class="text-right">
                                            <span
                                                class="block text-green-600 font-medium">Rp{{ number_format($siswa['total'], 0, ',', '.') }}</span>
                                            <span class="text-xs text-gray-500">{{ $siswa['count'] }} transaksi:
                                                {{ $siswa['rincian'] }}</span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-500">Tidak Ada Setoran</li>
                                @endforelse
                            </ul>
                        </div>

                        {{-- Detail Penarikan --}}
                        <div class="mt-4">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Detail Penarikan:</h4>
                            <ul class="space-y-2">
                                @forelse($penarikanDetailsByKelas[$kelas] ?? [] as $siswa)
                                    <li class="flex justify-between text-sm">
                                        <span class="text-gray-700">{{ $siswa['nama'] }}</span>
                                        <div class="text-right">
                                            <span
                                                class="block text-red-600 font-medium">Rp{{ number_format($siswa['total'], 0, ',', '.') }}</span>
                                            <span class="text-xs text-gray-500">{{ $siswa['count'] }} transaksi:
                                                {{ $siswa['rincian'] }}</span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-sm text-gray-500">Tidak Ada Penarikan</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection