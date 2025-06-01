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
                    <img src="https://png.pngtree.com/element_our/20190529/ourlarge/pngtree-financial-gold-currency-passbook-illustration-image_1224935.jpg"
                        class="h-8 me-3" alt="E-Tabungan Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">E-Tabungan</span>
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
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
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
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M14 3h-4V2h-2v1H6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z" />
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

                    <span class="ms-3 font-medium">Notifikasi</span>
                </a>
            </li>

            <li>
                <form action="{{ route('Student.logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-red-500 rounded-lg hover:text-red-900 hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5 text-red-500 transition duration-75 group-hover:text-red-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
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
