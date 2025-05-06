@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Verifikasi Akun Guru</h1>

        @if ($gurus->isEmpty())
            <p class="text-gray-500">Tidak ada akun guru yang menunggu verifikasi.</p>
        @else
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">NIP</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">File
                                Verifikasi</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($gurus as $guru)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $guru->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $guru->nip }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $guru->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500">
                                    <a href="{{ asset('storage/' . $guru->verification_file) }}" target="_blank"
                                        class="hover:underline">Lihat File</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                    @if ($guru->status == 'pending')
                                        <form action="{{ route('admin.approve.guru', $guru->id) }}" method="POST"
                                            class="inline-block mr-2">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-600 text-white text-xs font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                                Setujui
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.rejecte.guru', $guru->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white text-xs font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                Tolak
                                            </button>
                                        </form>
                                    @else
                                        <p class="text-sm text-gray-500">Status sudah diperbarui.</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection