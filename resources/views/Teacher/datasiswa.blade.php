@extends('layouts.appguru')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Daftar Siswa yang Anda Ajar</h1>
                <p class="text-gray-600 mt-2">Kelola data siswa di kelas Anda</p>
            </div>
            <div class="mt-4 md:mt-0">
                <form method="GET" action="{{ route('Teacher.datasiswa') }}"
                    class="flex flex-col md:flex-row items-center gap-2 w-full md:w-auto">

                    <div class="relative w-full md:w-64">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari siswa..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-sm text-white rounded-md">Cari</button>
                        <a href="{{ route('Teacher.datasiswa') }}"
                            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-sm text-gray-800 rounded-md">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        @if($siswas->isEmpty())
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            Belum ada data siswa di dalam kelas Anda
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Siswa
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NIS
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kelas
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($siswas as $index => $siswa)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                    {{ substr($siswa->name, 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $siswa->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $siswa->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $siswa->nis }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $siswa->kelas->tingkat ?? '-' }} {{ $siswa->kelas->nama_kelas ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection