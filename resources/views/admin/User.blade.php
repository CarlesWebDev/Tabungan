@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-4 sm:p-6 space-y-8 sm:space-y-10">

            {{-- Kartu Aksi --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                {{-- Tambah Guru --}}
                <div class="bg-gray-50 border border-gray-200 p-4 sm:p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-extrabold">Tambah Guru</h2>
                    <p class="text-gray-600 mt-2 text-sm">Tambahkan akun guru baru ke dalam sistem.</p>
                    <a href="{{ route('admin.tambahguru') }}"
                        class="mt-4 inline-block bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition w-full text-center text-sm sm:text-base">
                        Tambah Guru
                    </a>
                </div>

                {{-- Tambah Siswa --}}
                <div class="bg-gray-50 border border-gray-200 p-4 sm:p-6 rounded-xl shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-extrabold">Tambah Siswa</h2>
                    <p class="text-gray-600 mt-2 text-sm">Tambahkan akun siswa baru ke dalam sistem.</p>
                    <a href="{{ route('admin.tambahsiswa') }}"
                        class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition w-full text-center text-sm sm:text-base">
                        Tambah Siswa
                    </a>
                </div>

                {{-- Guru tidak Aktif --}}
                <div class="flex items-center p-3 sm:p-4 bg-red-50 rounded-xl shadow-md">
                    <div class="p-2 sm:p-3 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-5 sm:size-6">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <h3 class="text-sm sm:text-lg font-semibold text-gray-700">Guru Tidak Aktif</h3>
                        <p class="text-xl sm:text-2xl font-bold text-red-400">{{ $guruTidakAktif }}</p>
                    </div>
                </div>

                {{-- Guru Aktif --}}
                <div class="flex items-center p-3 sm:p-4 bg-green-50 rounded-xl shadow-md">
                    <div class="p-2 sm:p-3 bg-green-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-5 sm:size-6">
                            <path fill-rule="evenodd"
                                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <h3 class="text-sm sm:text-lg font-semibold text-gray-700">Guru Aktif</h3>
                        <p class="text-xl sm:text-2xl font-bold text-green-400">{{ $guruAktif }}</p>
                    </div>
                </div>

                {{-- Siswa tidak Aktif --}}
                <div class="flex items-center p-3 sm:p-4 bg-red-50 rounded-xl shadow-md">
                    <div class="p-2 sm:p-3 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 sm:size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <h3 class="text-sm sm:text-lg font-semibold text-gray-700">Siswa Tidak Aktif</h3>
                        <p class="text-xl sm:text-2xl font-bold text-red-400">{{ $siswaTidakAktif }}</p>
                    </div>
                </div>

                {{-- Siswa Aktif --}}
                <div class="flex items-center p-3 sm:p-4 bg-green-50 rounded-xl shadow-md">
                    <div class="p-2 sm:p-3 bg-green-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 sm:size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <div class="ml-3 sm:ml-4">
                        <h3 class="text-sm sm:text-lg font-semibold text-gray-700">Siswa Aktif</h3>
                        <p class="text-xl sm:text-2xl font-bold text-green-400">{{ $siswaAktif }}</p>
                    </div>
                </div>
            </div>

            {{-- Daftar Guru --}}
            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Data Guru</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-xs sm:text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">NIP</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">Nama</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 hidden sm:table-cell">Email</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">Status</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 hidden md:table-cell">Last active</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($gurus as $guru)
                                <tr class="hover:bg-gray-50 border-b border-gray-100">
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">{{ $guru->nip }}</td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">{{ $guru->name }}</td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2 hidden sm:table-cell">{{ $guru->email }}</td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">
                                        <span class="{{ $guru->is_active ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $guru->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2 hidden md:table-cell">
                                        <p>Terakhir aktif:
                                            {{ $guru->last_active_at ? $guru->last_active_at->diffForHumans() : '' }}
                                        </p>
                                    </td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">
                                        <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                            <a href="{{ route('admin.editguru', $guru->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded text-center text-xs sm:text-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.hapusguru', $guru->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus guru ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded w-full text-center text-xs sm:text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data guru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Daftar Siswa --}}
            <div class="mt-8 sm:mt-10">
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Data Siswa</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-xs sm:text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">NIS</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">Nama</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 hidden sm:table-cell">Email</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 hidden md:table-cell">Kelas</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">Status</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswas as $siswa)
                                <tr class="hover:bg-gray-50 border-b border-gray-100">
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">{{ $siswa->nis }}</td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">{{ $siswa->name }}</td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2 hidden sm:table-cell">{{ $siswa->email }}</td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2 hidden md:table-cell">
                                        {{ ($siswa->kelas) ? $siswa->kelas->tingkat . ' ' . $siswa->kelas->nama_kelas : '-' }}
                                    </td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">
                                        <span class="{{ $siswa->is_active ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $siswa->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-2 py-2 sm:px-3 sm:py-2">
                                        <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                            <a href="{{ route('admin.editsiswa', $siswa->id) }}"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded text-center text-xs sm:text-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.hapussiswa', $siswa->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded w-full text-center text-xs sm:text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data siswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection