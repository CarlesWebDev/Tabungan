<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="#" class="flex ms-2 md:me-24">
                    <img src="{{ asset('/images/Gambar1.png') }}" class="h-8 me-3" alt="Logo" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-black">E-Tabungan</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-200 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 break-keep" role="none">
                                {{-- {{ Auth::guard('admin')->user()->name }} --}}

                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{-- {{ Auth::guard('admin')->user()->email }} --}}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Sign out</a>
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
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                        viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025A1 1 0 0 0 8.934 3.027 8.5 8.5 0 1 0 17.973 12.066 1 1 0 0 0 16.975 11Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.Users') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                        viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267A6.439 6.439 0 0 1 11.27 8.905 4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="ms-3">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.Kelas') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M4 4h12v2H4zM4 9h12v2H4zM4 14h12v2H4z" />
                    </svg>
                    <span class="ms-3">Manajemen Kelas</span>
                </a>
            </li>
            <li>
                <a href=""
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586L2.707 14.879A1 1 0 003.414 16h13.172a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z" />
                    </svg>
                    <span class="ms-3">Notifikasi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.laporantabungan') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M3 3h14v2H3zM3 7h10v2H3zM3 11h14v2H3zM3 15h10v2H3z" />
                    </svg>
                    <span class="ms-3">Laporan Tabungan</span>
                </a>
            </li>
            <li>
                <a href=""
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M11.3 1.046a1 1 0 011.4.914V4.16a5.978 5.978 0 012.11.985l2.23-1.29a1 1 0 011.292 1.536l-2.23 1.29c.251.635.398 1.324.423 2.05l2.528.584a1 1 0 01-.23 1.967l-2.528-.584c-.071.646-.247 1.263-.52 1.837l1.843 1.842a1 1 0 01-1.414 1.415l-1.842-1.843a5.96 5.96 0 01-1.837.52l.584 2.528a1 1 0 01-1.967.23l-.584-2.528a6.048 6.048 0 01-2.05-.423l-1.29 2.23a1 1 0 01-1.536-1.292l1.29-2.23a5.978 5.978 0 01-.985-2.11H4.16a1 1 0 01-.914-1.4l.916-2a1 1 0 01.998-.6h1.21a5.977 5.977 0 01.986-2.11L4.2 2.338A1 1 0 015.491.802l2.23 1.29a5.96 5.96 0 012.05-.423V1.96a1 1 0 01.53-.914z" />
                    </svg>
                    <span class="ms-3">Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.verifikasiakun') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
                    <span class="ms-3">Verivikasi Akun</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-900" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3 4a1 1 0 011-1h6a1 1 0 010 2H5v10h5a1 1 0 110 2H4a1 1 0 01-1-1V4zm11.293 1.293a1 1 0 011.414 0L19 8.586a1 1 0 010 1.414l-3.293 3.293a1 1 0 11-1.414-1.414L15.586 11H9a1 1 0 110-2h6.586l-1.293-1.293a1 1 0 010-1.414z">
                            </path>
                        </svg>
                        <span class="ms-3">Sign out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>