@extends('layouts.appguru')

@section('content')
    <div class="space-y-8">
        {{-- Header Section --}}
        <div>
            <h1 class="text-2xl font-bold mt-4 text-gray-800 mb-2">Dashboard Guru</h1>
            <div class="bg-gray-500 p-6 rounded-xl shadow text-white">
                <p class="text-lg font-medium">Selamat datang <span class="font-bold">{{ Auth::user()->name }}</span></p>
                <p class="text-sm opacity-90 mt-1">Pantau aktivitas tabungan siswa dengan mudah dan cepat</p>
            </div>
        </div>

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-600 font-medium">Total Pemasukan (Setoran)</h3>
                        <p class="text-3xl font-bold text-green-700 mt-2">
                            Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full transform hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-red-500 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-600 font-medium">Total Penarikan</h3>
                        <p class="text-3xl font-bold text-red-700 mt-2">Rp{{ number_format($totalPenarikan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full transform hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filter Form --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Transaksi</h3>
            <form method="GET" action="{{ route('Teacher.dashboard') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Siswa</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama siswa..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Transaksi</label>
                        <select name="jenis"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">Semua Jenis</option>
                            <option value="setoran" {{ request('jenis') == 'setoran' ? 'selected' : '' }}>Setoran</option>
                            <option value="penarikan" {{ request('jenis') == 'penarikan' ? 'selected' : '' }}>Penarikan
                            </option>
                        </select>
                    </div>
                    <div class="flex items-end space-x-2">
                        <button type="submit"
                            class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                            Cari
                        </button>
                        <a href="{{ route('Teacher.dashboard') }}"
                            class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- Transaction Table --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Riwayat Transaksi</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Guru</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transaksis as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->nama_siswa }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->nama_guru }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $item->jenis_penarikan == 'setoran' ? 'bg-green-200 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($item->jenis_penarikan) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold {{ $item->jenis_penarikan == 'penarikan' ? 'text-red-700' : 'text-green-700' }}">
                                        Rp{{ number_format($item->jumlah, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ucfirst($item->keterangan) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Enhanced Chart Section --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Analisis Tabungan</h3>
            </div>
                <div class="h-80">
                    <canvas id="tabunganComparisonChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const comparisonCtx = document.getElementById('tabunganComparisonChart').getContext('2d');
            const comparisonChart = new Chart(comparisonCtx, {
                type: 'line',
                data: {
                    labels: ['Setoran', 'Penarikan'],
                    datasets: [{
                        label: 'Total',
                        data: [{{ $totalPemasukan }}, {{ $totalPenarikan }}],
                        backgroundColor: [
                            'rgba(52, 211, 153, 0.7)',
                            'rgba(248, 113, 113, 0.7)'
                        ],
                        borderColor: [
                            'rgba(16, 185, 129, 1)',
                            'rgba(239, 68, 68, 1)'
                        ],
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: '',
                            font: {
                                size: 14
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return 'Rp' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'Rp' + value.toLocaleString('id-ID');
                                }
                            },
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
    </script>
@endsection
