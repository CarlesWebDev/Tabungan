@extends('layouts.appsiswa')

@section('content')
    <h2 class="text-lg font-bold mb-4">Riwayat Tabungan</h2>



    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <h2 class="text-lg font-bold mb-4">Riwayat Tabungan {{ $siswa->name }}</h2>

        <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nama Siswa</th>
                    <th class="border px-4 py-2">Nama Guru</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Jenis</th>
                    <th class="border px-4 py-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $siswa->name }}</td>
                        <td class="border px-4 py-2">{{ $item->guru->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($item->jenis_penarikan) }}</td>
                        <td class="border px-4 py-2">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
@endsection