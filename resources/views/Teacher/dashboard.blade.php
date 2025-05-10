@extends('layouts.appguru')

@section('content')
    <h5 class="text-lg font-bold mb-4">INI DASHBOARD GURU</h5>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-green-700">Total Pemasukan (Setoran)</h2>
            <p class="text-2xl font-bold text-green-900">Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</p>
        </div>
        <div class="bg-red-100 p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-red-700">Total Penarikan</h2>
            <p class="text-2xl font-bold text-red-900">Rp{{ number_format($totalPenarikan, 0, ',', '.') }}</p>
        </div>
    </div>
@endsection