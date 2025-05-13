@extends('layouts.appguru')

@section('content')
    <div class="container mt-4">
        <h2>Kirim Notifikasi ke Siswa</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('Teacher.storeNotifikasi') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="siswa_id">Pilih Siswa</label>
            <select name="siswa_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @forelse($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->name }} ({{ $siswa->kelas->nama_kelas ?? '-' }})</option>
                @empty
                    <option value="" disabled>Data siswa tidak tersedia</option>
                @endforelse
            </select>

            </div>

            <div class="form-group mt-3">
                <label for="notikasi">Pesan Notifikasi</label>
                <textarea name="notikasi" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kirim</button>
        </form>
    </div>
@endsection