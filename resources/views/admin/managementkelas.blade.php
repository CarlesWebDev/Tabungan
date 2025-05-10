@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-6 space-y-10">
            {{-- Kartu Aksi --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Tambah Guru --}}
                <div class="bg-gray-50 border border-gray-200 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg sm:text-xl font-extrabold text-gray-900">Tambah Kelas</h2>
                    <p class="text-gray-600 mt-2 text-sm">Tambahkan kelas baru ke dalam sistem untuk mengelola siswa dengan
                        lebih baik.
                    </p>
                    <a href="{{ route('admin.tambahkelas') }}"
                        class="mt-4  bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition w-full text-center flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M12 2a1 1 0 011 1v8h8a1 1 0 110 2h-8v8a1 1 0 11-2 0v-8H3a1 1 0 110-2h8V3a1 1 0 011-1z" />
                        </svg>
                        Tambah Kelas
                    </a>
                </div>

            </div>

            {{-- Daftar kelas --}}
            <div class="mt-10">
                <h3 class="text-xl font-semibold  mb-4">Data Kelas</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr>
                                <th class="px-3 py-3">Nama Kelas</th>
                                <th class="px-3 py-3">Jurusan</th>
                                <th class="px-3 py-3">Jumlah Siswa</th>
                                <th class="px-3 py-3">Tingkat</th>
                                <th class="px-3 py-3">Wali Kelas</th>
                                <th class="px-3 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kelas as $kelass)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">{{ $kelass->nama_kelas }}</td>
                                    <td class="px-3 py-2">{{ $kelass->jurusan }}</td>
                                    <td class="px-3 py-2">{{ $kelass->siswas_count }}</td>
                                    <td class="px-3 py-2">{{ $kelass->tingkat }}</td>
                                    <td class="px-3 py-2">{{ $kelass->guru->name }}</td>
                                    <td class="px-3 py-2">
                                        <div class="flex flex-col sm:flex-row gap-2">
                                            <a href="{{ route('admin.editKelas', $kelass->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-center">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.hapusKelas', $kelass->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus Kelas ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded w-full text-center">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data Kelas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection