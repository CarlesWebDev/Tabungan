@extends('layouts.appsiswa')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Dashboard -->
        <div class="mb-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard Tabungan Siswa</h1>
                    <p class="text-gray-600 mt-2">Selamat datang kembali, <span
                            class="font-semibold text-blue-600">{{ Auth::user()->name }}</span></p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                        Terakhir login: {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY, HH:mm') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Total Tabungan -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Tabungan</h3>
                        <p class="text-2xl font-bold text-gray-900 mt-2">Rp{{ number_format($totalTabungan, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Saldo terkini</p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Setoran -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Setoran</h3>
                        <p class="text-2xl font-bold text-green-600 mt-2">Rp{{ number_format($totalSetoran, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-green-50 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Penarikan -->
            <div
                class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Penarikan</h3>
                        <p class="text-2xl font-bold text-red-600 mt-2">Rp{{ number_format($totalPenarikan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-red-50 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24"
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
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Perkembangan Total Tabungan</h3>
                    </div>
                </div>
                <div class="p-4 h-80">
                    <div id="tabunganChart"></div>
                </div>
            </div>

            <!-- Riwayat Terakhir -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Riwayat Transaksi</h3>
                    <a href="{{ route('Student.riwayat') }}"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        Lihat semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse($transaksiTerakhir as $transaksi)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="p-2 rounded-lg {{ $transaksi->jenis_penarikan == 'setoran' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($transaksi->jenis_penarikan == 'setoran')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4" />
                                            @endif
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ ucfirst($transaksi->jenis_penarikan) }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal)->isoFormat('D MMMM YYYY') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p
                                        class="font-semibold {{ $transaksi->jenis_penarikan == 'setoran' ? 'text-green-600' : 'text-red-600' }}">
                                        Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}
                                    </p>
                                    @if($transaksi->keterangan)
                                        <p class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ $transaksi->keterangan }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada transaksi</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai menabung untuk melihat riwayat transaksi</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                chart: {
                    type: 'area',
                    height: '100%',
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    fontFamily: 'Inter, sans-serif',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 900,
                        animateGradually: { enabled: true, delay: 150 },
                        dynamicAnimation: { enabled: true, speed: 350 }
                    }
                },
                series: [{
                    name: 'Saldo Tabungan',
                    data: {!! json_encode($chartData) !!}
                }],
                xaxis: {
                    categories: {!! json_encode($chartLabels) !!},
                    labels: {
                        style: { colors: '#6B7280', fontSize: '13px', fontWeight: '600' }
                    },
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                yaxis: {
                    labels: {
                        formatter: val => 'Rp' + val.toLocaleString('id-ID'),
                        style: { colors: '#6B7280', fontSize: '13px' }
                    },
                    forceNiceScale: true
                },
                stroke: {
                    curve: 'smooth',
                    width: 4,
                    colors: ['#3B82F6']
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.6,
                        gradientToColors: ['#60A5FA'], // warna gradien akhir
                        opacityFrom: 0.7,
                        opacityTo: 0.2,
                        stops: [0, 80, 100]
                    }
                },
                colors: ['#3B82F6'],
                tooltip: {
                    enabled: true,
                    theme: 'light',
                    style: { fontSize: '13px', fontFamily: 'Inter, sans-serif' },
                    y: {
                        formatter: val => 'Rp' + val.toLocaleString('id-ID'),
                        title: { formatter: () => 'Saldo' }
                    },
                    x: { show: false }
                },
                grid: {
                    borderColor: '#E5E7EB',
                    strokeDashArray: 4,
                    padding: { left: 15, right: 15, top: 5, bottom: 5 }
                },
                markers: {
                    size: 6,
                    colors: ['#3B82F6'],
                    strokeColors: '#FFFFFF',
                    strokeWidth: 3,
                    hover: { size: 9 }
                },
                dataLabels: { enabled: false }
            };

            var chart = new ApexCharts(document.querySelector("#tabunganChart"), options);
            chart.render();
        });
    </script>
@endsection