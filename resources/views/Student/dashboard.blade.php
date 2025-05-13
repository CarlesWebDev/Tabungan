@extends('layouts.appsiswa')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Dashboard -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Siswa</h1>
            <p class="text-gray-600 mt-1">Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span></p>
        </div>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Tabungan -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total Tabungan</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">Rp{{ number_format($totalTabungan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Setoran -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total Setoran</h3>
                        <p class="text-2xl font-bold text-green-600 mt-1">Rp{{ number_format($totalSetoran, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Penarikan -->
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total Penarikan</h3>
                        <p class="text-2xl font-bold text-red-600 mt-1">Rp{{ number_format($totalPenarikan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik dan Riwayat -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Grafik Tabungan -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Tabungan</h3>
                <div class="h-64">
                    <canvas id="tabunganChart"></canvas>
                </div>
            </div>

            <!-- Transaksi Terakhir -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Transaksi Terakhir</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse($transaksiTerakhir as $transaksi)
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium">{{ ucfirst($transaksi->jenis_penarikan) }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($transaksi->tanggal)->isoFormat('D MMMM YYYY') }}</p>
                                </div>
                                <p
                                    class="font-semibold {{ $transaksi->jenis_penarikan == 'setoran' ? 'text-green-600' : 'text-red-600' }}">
                                    Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}
                                </p>
                            </div>
                            @if($transaksi->keterangan)
                                <p class="text-sm text-gray-500 mt-1">{{ $transaksi->keterangan }}</p>
                            @endif
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            Belum ada transaksi
                        </div>
                    @endforelse
                </div>
                @if($transaksiTerakhir->count() > 0)
                    <div class="p-4 border-t border-gray-200 text-center">
                        <a href="{{ route('Student.riwayat') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Lihat semua transaksi →
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('tabunganChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Saldo Tabungan',
                        data: {!! json_encode($chartData) !!},
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.05)',
                        borderWidth: 2,
                        tension: 0.1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
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
                            beginAtZero: false,
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