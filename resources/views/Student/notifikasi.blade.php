@extends('layouts.appsiswa')

@section('content')

    <div class="container mt-4">
        <h1 class="mb-4">Notifikasi</h1>

        <!-- Cek apakah ada notifikasi -->
        @if($notifikasis->isEmpty())
            <div class="alert alert-info">
                Belum ada notifikasi untuk Anda.
            </div>
        @else
            <div class="list-group">
                @foreach($notifikasis as $notifikasi)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $notifikasi->notikasi }}</strong>
                            <br>
                            <small>Guru: {{ $notifikasi->guru ? $notifikasi->guru->name : 'Tidak diketahui' }}</small>
                            <br>
                            <small>Kelas: {{ $notifikasi->kelas ? $notifikasi->kelas->nama_kelas : 'Tidak diketahui' }}</small>
                        </div>

                        <div>
                            @if($notifikasi->status == 'unread')
                                <span class="badge badge-warning">Belum Dibaca</span>
                            @else
                                <span class="badge badge-success">Sudah Dibaca</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection