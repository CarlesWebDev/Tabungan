<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('Student.dashboard') }}" class="flex ms-2 md:me-24">
                    <svg xmlns="http://www.w3.org/2000/svg" class="lucide lucide-piggy-bank h-9 w-9 text-blue-600" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2h0V5z">
                        </path>
                        <path d="M2 9v1c0 1.1.9 2 2 2h1"></path>
                        <path d="M16 11h0"></path>
                    </svg>
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap  text-blue-500">EduSaving</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <div
                                class="relative inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-gradient-to-br from-blue-500 to-blue-600 rounded-full">
                                <span class="font-medium text-sm text-white">
                                    {{ Auth::guard('siswa')->check() ? strtoupper(substr(Auth::guard('siswa')->user()->name, 0, 1)) : '?' }}
                                </span>
                            </div>

                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 break-words" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('Student.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Profil</a>
                            </li>
                            <li>
                                <form action="{{ route('Student.logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-red-900 group">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('Student.dashboard') }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 group
                    {{ request()->routeIs('Student.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}">

                    <!-- Ikon -->
                    <div class="flex items-center justify-center w-6 h-6 transition-colors duration-200
                        {{ request()->routeIs('Student.dashboard') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm6 2a1 1 0 00-2 0v8a1 1 0 002 0V8zm4 4a1 1 0 10-2 0v4a1 1 0 002 0v-4zm3-2a1 1 0 112 0v6a1 1 0 11-2 0V10z"
                            clip-rule="evenodd" />
                    </svg>
                    </div>
                    <span class="ms-3 font-medium">Dashboard</span>
                </a>
            </li>


            <li>
                <a href="{{ route('Student.riwayat') }}" class="flex items-center p-2 rounded-lg transition-colors duration-200 group
                    {{ request()->routeIs('Student.riwayat') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}">

                    <!-- Ikon -->
                    <div class="flex items-center justify-center w-6 h-6 transition-colors duration-200
                        {{ request()->routeIs('Student.riwayat') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2 4v16a2 2 0 0 0 2 2h0a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h0a2 2 0 0 0-2 2Zm4 0h14v16H6M8 8h8M8 12h6" />
                        </svg>
                    </div>

                    <span class="ms-3 font-medium">Riwayat Tabungan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('Student.notifikasi') }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 group
                    {{ request()->routeIs('Student.notifikasi') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}">

                    <!-- Ikon -->
                    <div class="flex items-center justify-center w-6 h-6 transition-colors duration-200
                        {{ request()->routeIs('Student.notifikasi') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </div>

            <span class="ms-3 font-medium flex items-center gap-2">
                Notifikasi
                @if(isset($unread) && $unread > 0)
                    <span
                        class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                        {{ $unread }}
                    </span>
                @endif
            </span>


                </a>
            </li>

            <li>
                <form action="{{ route('Student.logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="button" id="logout-button"
                        class="flex items-center p-2 text-red-500 rounded-lg hover:text-red-900 hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Log out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>

<script>
    document.getElementById('logout-button').addEventListener('click', function () {
        Swal.fire({
            title: 'Keluar?',
            text: "Apakah kamu yakin ingin keluar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>
