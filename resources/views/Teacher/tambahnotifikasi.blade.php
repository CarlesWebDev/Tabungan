@extends('layouts.appguru')

@section('content')
    <div class="max-w-full mx-auto my-8">
        <div class="rounded-xl overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-white">Kirim Notifikasi ke Siswa</h2>
                        <p class="text-indigo-100 text-sm mt-1">Sampaikan pesan penting kepada siswa secara langsung</p>
                    </div>
                    <div class="bg-indigo-500 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-green-700 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('Teacher.storeNotifikasi') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Student Selection -->
                    <div>
                        <label for="siswa_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Penerima Notifikasi
                            <span class="hidden md:inline text-xs text-gray-500">
                                (Gunakan Ctrl lalu di barengi dengan Touchpad pencet satu satu nama tersebut)
                            </span>

                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                                </svg>
                            </div>
                            <select name="siswa_id[]" id="siswa_id" multiple required
                                class="pl-10 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 py-2">
                                @forelse($siswas as $siswa)
                                    <option value="{{ $siswa->id }}" class="py-1">
                                        {{ $siswa->name }} ({{ $siswa->kelas->tingkat ?? '-' }}{{ $siswa->kelas->nama_kelas ?? '-' }} - NIS: {{ $siswa->nis }})
                                    </option>
                                @empty
                                    <option value="" disabled>Data siswa tidak tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <!-- Notification Message -->
                    <div>
                        <label for="notikasi" class="block text-sm font-medium text-gray-700 mb-2">Isi Pesan</label>
                        <div class="relative">
                            <textarea name="notikasi" id="notikasi" rows="5" required
                                class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-3"
                                placeholder="Tulis pesan notifikasi yang akan dikirim ke siswa..."></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400" id="charCounter">0/500 karakter</div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                            </svg>
                            Kirim Notifikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Character counter for notification message
        document.getElementById('notikasi').addEventListener('input', function() {
            const charCount = this.value.length;
            document.getElementById('charCounter').textContent = `${charCount}/500 karakter`;

            if (charCount > 500) {
                document.getElementById('charCounter').classList.add('text-red-500');
                document.getElementById('charCounter').classList.remove('text-gray-400');
            } else {
                document.getElementById('charCounter').classList.remove('text-red-500');
                document.getElementById('charCounter').classList.add('text-gray-400');
            }
        });
    </script>
@endsection