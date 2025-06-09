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
                <a href="https://png.pngtree.com/element_our/20190529/ourlarge/pngtree-financial-gold-currency-passbook-illustration-image_1224935.jpg"
                    class="flex ms-2 md:me-24">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="size-8 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap  text-blue-500">EduSaving</span>
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
                                    {{ Auth::guard('guru')->check() ? strtoupper(substr(Auth::guard('guru')->user()->name, 0, 1)) : '?' }}
                                </span>
                            </div>
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 break-words" role="none">
                                {{-- {{ Auth::guard('guru')->user()->name }} --}}
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{-- {{ Auth::guard('guru')->user()->email }} --}}
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        {{-- <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('Teacher.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
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
                        </ul> --}}
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
                <a href="{{ route('Teacher.dashboard') }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 group
                    {{ request()->routeIs('Teacher.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm6 2a1 1 0 00-2 0v8a1 1 0 002 0V8zm4 4a1 1 0 10-2 0v4a1 1 0 002 0v-4zm3-2a1 1 0 112 0v6a1 1 0 11-2 0V10z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3 font-medium">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('Teacher.transaksi') }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 group
                    {{ request()->routeIs('Teacher.transaksi') ? 'bg-blue-50 text-blue-600' : 'text-gray-900 hover:bg-gray-100' }}">
                    <svg class="w-5 h-5 transition-colors duration-200
                        {{ request()->routeIs('Teacher.transaksi') ? 'text-blue-600' : 'text-gray-500 group-hover:text-gray-900' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    <span class="ms-3 font-medium">Transaksi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('Teacher.createNotifikasi') }}"
                    class="flex items-center p-2 rounded-lg transition-colors duration-200 group
                    {{ request()->routeIs('Teacher.createNotifikasi') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}">

                    <div
                        class="flex items-center justify-center w-6 h-6 transition-colors duration-200
                        {{ request()->routeIs('Teacher.createNotifikasi') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="lucide lucide-bell w-5 h-5 {{ request()->routeIs('Teacher.createNotifikasi') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 01-3.46 0" />
                        </svg>
                    </div>

                    <span class="ms-3 font-medium">Notifikasi</span>
                </a>
            </li>


            <li>
                <form id="logout-form" method="POST" action="{{ route('Teacher.logout') }}">
                    @csrf
                    <button type="button" id="logout-button"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            fill="currentColor" viewBox="0 0 20 20">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('#logo-sidebar a[href]');
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('bg-blue-50', 'text-blue-600');
                link.querySelector('div').classList.add('text-blue-600');
                link.querySelector('div').classList.remove('text-gray-500', 'group-hover:text-blue-600');
            }
        });
    });

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
        })
    });

</script>