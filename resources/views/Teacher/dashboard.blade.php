@extends('layouts.appguru')

@section('content')
    <div class="space-y-6">
        {{-- Heading --}}
        <h1 class="text-2xl font-bold">Dashboard Guru</h1>
        <div class=" bg-gray-600 p-6 rounded-xl shadow text-white">
            <p class="text-sm mt-1 opacity-90">Selamat datang <b>{{ Auth::user()->name }}</b></p>
            <small>pantau aktivitas tabungan siswa dengan mudah dan cepat</small>
        </div>

        {{-- Statistik Total --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border-l-8 border-green-500 p-5 rounded-lg shadow hover:shadow-md transition">
                <h2 class="text-gray-600 text-lg font-semibold">Total Pemasukan (Setoran)</h2>
                <p class="text-3xl font-bold text-green-700 mt-2">Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white border-l-8 border-red-500 p-5 rounded-lg shadow hover:shadow-md transition">
                <h2 class="text-gray-600 text-lg font-semibold">Total Penarikan</h2>
                <p class="text-3xl font-bold text-red-700 mt-2">Rp{{ number_format($totalPenarikan, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- Form Filter Pencarian --}}
        <form method="GET" action="{{ route('Teacher.dashboard') }}" class="mb-6">
            <div class="flex flex-col sm:flex-row sm:flex-wrap gap-3 items-stretch">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama siswa..."
                    class="flex-1 min-w-[180px] px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="flex-1 min-w-[180px] px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <select name="jenis"
                    class="flex-1 min-w-[180px] px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Jenis</option>
                    <option value="setoran" {{ request('jenis') == 'setoran' ? 'selected' : '' }}>Setoran</option>
                    <option value="penarikan" {{ request('jenis') == 'penarikan' ? 'selected' : '' }}>Penarikan</option>
                </select>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition w-full sm:w-auto">
                    Cari
                </button>

                <a href="{{ route('Teacher.dashboard') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition w-full sm:w-auto text-center">
                    Reset
                </a>
            </div>
        </form>


        {{-- Tabel Transaksi --}}
        <div class="bg-white rounded-xl shadow overflow-x-auto p-4">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Riwayat Transaksi</h3>
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Siswa</th>
                        <th class="px-4 py-3">Nama Guru</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Jenis</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($transaksis as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $item->nama_siswa }}</td>
                            <td class="px-4 py-2">{{ $item->nama_guru }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                            <td
                                class="px-4 py-2 {{ $item->jenis_penarikan == 'setoran' ? 'text-green-600' : 'text-red-400' }} capitalize">
                                {{ $item->jenis_penarikan }}
                            </td>
                            {{-- <td class="px-4 py-2  text-red-400 capitalize">{{ $item->jenis_penarikan }}</td> --}}
                            <td
                                class="px-4 py-2 {{ $item->jenis_penarikan == 'penarikan' ? 'text-red-700' : 'text-green-700' }} font-semibold">
                                Rp{{ number_format($item->jumlah, 0, ',', '.') }}
                            </td>

                            {{-- <td class="px-4 py-2 text-green-700 font-semibold">Rp{{ number_format($item->jumlah, 0, ',',
                                '.') }}</td> --}}
                            <td class="px-4 py-2">{{ $item->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Grafik Tabungan --}}
        <div class="bg-white rounded-xl shadow p-6 mt-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Grafik</h3>
            <canvas id="tabunganChart" height="100"></canvas>
        </div>

    </div>

    {{-- Script untuk Chart.js --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('tabunganChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Setoran', 'Penarikan'],
                    datasets: [{
                        label: 'Jumlah (Rp)',
                        data: [{{ $totalPemasukan }}, {{ $totalPenarikan }}],
                        backgroundColor: ['#34D399', '#F87171'],
                        borderColor: ['#10B981', '#EF4444'],
                        borderWidth: 1,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return 'Rp' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'Rp' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection