@extends('layouts.landing_layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>EduSavings</title>
        @vite('resources/css/app.css')
    </head>


    <body class="bg-white text-black">
        <header class="fixed w-full z-50 transition-all duration-300 bg-gray-100 py-4 shadow-md">
            <div class="container mx-auto px-4 md:px-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>

                        <span class="ml-2 text-xl font-sans font-bold text-blue-500">EduSavings</span>
                    </div>

                    <nav class="hidden md:flex space-x-8">
                        <a href="#beranda"
                            class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
                        <a href="#fitur" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Fitur</a>
                        <a href="#cara-kerja" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Cara
                            Kerja</a>
                        <a href="#testimonial"
                            class="font-medium text-gray-700 hover:text-blue-600 transition-colors">Testimonial</a>
                        <a href="#faq" class="font-medium text-gray-700 hover:text-blue-600 transition-colors">FAQ</a>
                    </nav>

                    <div class="hidden md:flex space-x-4">
                        <button onclick="toggleModal(true)"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Masuk / Daftar
                        </button>
                    </div>

                    <div id="roleModal" class="fixed inset-0 bg-black/10 hidden items-center justify-center z-50">
                        <div class="bg-white rounded-xl shadow-lg w-96 p-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4 text-center">Pilih Role</h2>

                            <div class="space-y-4">
                                <div>
                                    <h3 class="font-medium text-gray-700 mb-2">Masuk</h3>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('login.guru') }}"
                                            class="flex-1 px-3 py-2 text-center bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition">
                                            Guru
                                        </a>
                                        <a href="{{ route('login.siswa') }}"
                                            class="flex-1 px-3 py-2 text-center bg-green-100 text-green-600 rounded-md hover:bg-green-200 transition">
                                            Siswa
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="font-medium text-gray-700 mb-2">Daftar</h3>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('register.guru.form') }}"
                                            class="flex-1 px-3 py-2 text-center bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                            Guru
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <button onclick="toggleModal(false)"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>


                    <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" y1="6" x2="20" y2="6" />
                            <line x1="4" y1="12" x2="20" y2="12" />
                            <line x1="4" y1="18" x2="20" y2="18" />
                        </svg>
                    </button>
                </div>

                <div id="mobile-menu"
                    class="md:hidden hidden bg-white shadow-md mt-4 px-4 py-2 space-y-4 transition-all duration-300">
                    <a href="#beranda" class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
                    <a href="#fitur" class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">Fitur</a>
                    <a href="#cara-kerja" class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">Cara
                        Kerja</a>
                    <a href="#testimonial"
                        class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">Testimonial</a>
                    <a href="#faq" class="block py-2 text-gray-700 hover:text-blue-600 transition-colors">FAQ</a>
                    <button onclick="toggleModal(true)"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Masuk / Daftar
                </div>
            </div>
        </header>


        <section id="beranda" class="pt-24 md:pt-32 pb-16 md:pb-24 bg-gradient-to-br from-blue-50 to-white">
            <div class="container mx-auto px-4 md:px-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 text-center md:text-left  mb-12 md:mb-0">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-4 font-sans">
                            Tabungan
                            Cerdas <span class="text-blue-600">Cerdas untuk Masa Depan Gemilang</span></h1>
                        <p class="text-lg md:text-xl text-gray-700 mb-8 max-w-lg mx-auto md:mx-0">EduSavings adalah platform
                            manajemen tabungan siswa yang modern dan efisien. Dengan antarmuka yang ramah pengguna dan
                            sistem yang terintegrasi, EduSavings membantu sekolah mengedukasi siswa tentang pentingnya
                            menabung sejak dini.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <button onclick="toggleModal(true)"
                                class="px-6 py-3 bg-blue-600 md:hidden text-white rounded-lg justify-center hover:bg-blue-700 transition-colors shadow-md flex items-center ">Mulai
                                Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-5 w-5">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </button>
                            <a href="#cara-kerja"
                                class="px-6 py-3 bg-white text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                                Pelajari Lebih Lanjut
                            </a>

                        </div>

                        <div class="mt-8 flex items-center justify-center md:justify-start space-x-4">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white overflow-hidden"><img
                                        src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=60"
                                        alt="User" class="w-full h-full object-cover"></div>
                                <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white overflow-hidden"><img
                                        src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=60"
                                        alt="User" class="w-full h-full object-cover"></div>
                                <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white overflow-hidden"><img
                                        src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=60"
                                        alt="User" class="w-full h-full object-cover"></div>
                                <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white overflow-hidden"><img
                                        src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=60"
                                        alt="User" class="w-full h-full object-cover"></div>
                            </div><span class="text-sm text-gray-600"><span class="font-bold">1,000+</span> siswa telah
                                bergabung</span>
                        </div>
                    </div>
                    {{-- Img --}}
                    <div class="md:w-1/2">
                        <div class="relative">
                            <div class="relative z-10 bg-white p-1 rounded-xl shadow-lg">
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                    alt="Students using EduSavings" class="w-full h-auto rounded-lg object-cover">
                            </div>

                            <div
                                class="absolute -bottom-8 -right-8 bg-white p-4 rounded-xl shadow-lg flex items-center z-20">
                                <div class="mr-3 bg-green-100 p-2 rounded-full">
                                    <div
                                        class="w-8 h-8 flex items-center justify-center bg-green-500 text-white rounded-full">
                                        ↑</div>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Total Tabungan</p>
                                    <p class="text-lg font-bold text-gray-900">Rp 5,4 M+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fitur" class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-4 md:px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Solusi Tabungan Modern untuk Siswa</h2>
                    <p class="text-lg text-gray-700 max-w-2xl mx-auto">EduSavings hadir dengan fitur-fitur inovatif yang
                        memudahkan siswa mengelola tabungan pendidikan mereka.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3  gap-8">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="mb-4 transition-transform duration-300 transform group-hover:scale-110"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shield-check w-10 h-10 text-blue-600">
                                <path
                                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                                </path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg></div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Keamanan Terjamin</h3>
                        <p class="text-gray-700">Data tabungan dan transaksi dilindungi dengan enkripsi tingkat tinggi dan
                            perlindungan multi-level.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="mb-4 transition-transform duration-300 transform group-hover:scale-110"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-line-chart w-10 h-10 text-blue-600">
                                <path d="M3 3v18h18"></path>
                                <path d="m19 9-5 5-4-4-3 3"></path>
                            </svg></div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Pelacakan Progres</h3>
                        <p class="text-gray-700">Pantau perkembangan tabungan dengan visualisasi data yang intuitif dan
                            laporan
                            berkala.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="mb-4 transition-transform duration-300 transform group-hover:scale-110"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-clock w-10 h-10 text-blue-600">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg></div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Tabungan Otomatis</h3>
                        <p class="text-gray-700">Atur jadwal tabungan rutin untuk membangun kebiasaan menabung yang
                            konsisten.
                        </p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="mb-4 transition-transform duration-300 transform group-hover:scale-110"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-credit-card w-10 h-10 text-blue-600">
                                <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                <line x1="2" x2="22" y1="10" y2="10"></line>
                            </svg></div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Metode Pembayaran Fleksibel</h3>
                        <p class="text-gray-700">Berbagai pilihan untuk menambah saldo tabungan, termasuk transfer bank dan
                            e-wallet.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="mb-4 transition-transform duration-300 transform group-hover:scale-110"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-bar-chart3 w-10 h-10 text-blue-600">
                                <path d="M3 3v18h18"></path>
                                <path d="M18 17V9"></path>
                                <path d="M13 17V5"></path>
                                <path d="M8 17v-3"></path>
                            </svg></div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Analisis Keuangan</h3>
                        <p class="text-gray-700">Dapatkan rekomendasi tabungan berdasarkan analisis pola pengeluaran dan
                            tujuan
                            keuangan.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="mb-4 transition-transform duration-300 transform group-hover:scale-110"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-badge-check w-10 h-10 text-blue-600">
                                <path
                                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z">
                                </path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg></div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Pencapaian &amp; Rewards</h3>
                        <p class="text-gray-700">Raih penghargaan dan hadiah saat mencapai tonggak penting dalam perjalanan
                            menabung Anda.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 bg-blue-600">
            <div class="container mx-auto px-4 md:px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="bg-white rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-users h-8 w-8 text-blue-600">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg></div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-1">50,000+</h3>
                        <p class="text-blue-100">Siswa Aktif</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-school h-8 w-8 text-blue-600">
                                <path d="M14 22v-4a2 2 0 1 0-4 0v4"></path>
                                <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2"></path>
                                <path d="M18 5v17"></path>
                                <path d="m4 6 8-4 8 4"></path>
                                <path d="M6 5v17"></path>
                                <circle cx="12" cy="9" r="2"></circle>
                            </svg></div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-1">750+</h3>
                        <p class="text-blue-100">Sekolah Bermitra</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-landmark h-8 w-8 text-blue-600">
                                <line x1="3" x2="21" y1="22" y2="22"></line>
                                <line x1="6" x2="6" y1="18" y2="11"></line>
                                <line x1="10" x2="10" y1="18" y2="11"></line>
                                <line x1="14" x2="14" y1="18" y2="11"></line>
                                <line x1="18" x2="18" y1="18" y2="11"></line>
                                <polygon points="12 2 20 7 4 7"></polygon>
                            </svg></div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-1"> 5,4 M+</h3>
                        <p class="text-blue-100">Total Tabungan</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white rounded-full h-16 w-16 flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-badge-check h-8 w-8 text-blue-600">
                                <path
                                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z">
                                </path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg></div>
                        <h3 class="text-2xl md:text-3xl font-bold text-white mb-1">100%</h3>
                        <p class="text-blue-100">Tingkat Kepuasan</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="cara-kerja" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4 md:px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Bagaimana EduSavings Bekerja</h2>
                    <p class="text-lg text-gray-700 max-w-2xl mx-auto">Empat langkah sederhana untuk memulai kebiasaan
                        menabung
                        yang cerdas untuk masa depan pendidikan.</p>
                </div>
                <div class="relative">
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5  -translate-y-1/2"></div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="relative flex flex-col items-center">
                            <div
                                class="bg-blue-600 w-16 h-16 rounded-full flex items-center justify-center shadow-md mb-4 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-user-plus w-10 h-10 text-white">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <line x1="19" x2="19" y1="8" y2="14"></line>
                                    <line x1="22" x2="16" y1="11" y2="11"></line>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Daftar Akun</h3>
                                <p class="text-gray-700">Buat akun dengan mengisi informasi dasar siswa dan verifikasi
                                    identitas
                                    sekolah.</p>
                            </div>
                            <div class="hidden md:flex absolute top-8 -right-4 items-center justify-center">
                                <div class="text-gray-400 text-2xl">→</div>
                            </div>
                        </div>
                        <div class="relative flex flex-col items-center">
                            <div
                                class="bg-green-500 w-16 h-16 rounded-full flex items-center justify-center shadow-md mb-4 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-piggy-bank w-10 h-10 text-white">
                                    <path
                                        d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2h0V5z">
                                    </path>
                                    <path d="M2 9v1c0 1.1.9 2 2 2h1"></path>
                                    <path d="M16 11h0"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Mulai Menabung</h3>
                                <p class="text-gray-700">Setor tabungan pertama dan tetapkan target tabungan untuk tujuan
                                    pendidikan.</p>
                            </div>
                            <div class="hidden md:flex absolute top-8 -right-4 items-center justify-center">
                                <div class="text-gray-400 text-2xl">→</div>
                            </div>
                        </div>
                        <div class="relative flex flex-col items-center">
                            <div
                                class="bg-indigo-500 w-16 h-16 rounded-full flex items-center justify-center shadow-md mb-4 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-bar-chart w-10 h-10 text-white">
                                    <line x1="12" x2="12" y1="20" y2="10"></line>
                                    <line x1="18" x2="18" y1="20" y2="4"></line>
                                    <line x1="6" x2="6" y1="20" y2="16"></line>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Pantau Pertumbuhan</h3>
                                <p class="text-gray-700">Lihat perkembangan tabungan dan analisis kebiasaan menabung
                                    melalui
                                    dasbor.</p>
                            </div>
                            <div class="hidden md:flex absolute top-8 -right-4 items-center justify-center">
                                <div class="text-gray-400 text-2xl">→</div>
                            </div>
                        </div>
                        <div class="relative flex flex-col items-center">
                            <div
                                class="bg-orange-500 w-16 h-16 rounded-full flex items-center justify-center shadow-md mb-4 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-award w-10 h-10 text-white">
                                    <circle cx="12" cy="8" r="6"></circle>
                                    <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Persiapan Masa Depan</h3>
                                <p class="text-gray-700"> menabung hari ini untuk mendukung impian dan pendidikan esok
                                    hari.
                                </p>
                            </div>
                            <div class="hidden md:flex absolute top-8 -right-4 items-center justify-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="testimonial" class="relative w-full max-w-4xl mx-auto" data-carousel="slide">
            <div class="relative h-96 overflow-hidden rounded-2xl">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <div class=" p-8 rounded-xl shadow-lg border border-gray-100 max-w-2xl w-full">
                            <svg class="w-10 h-10 text-blue-500 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                            <blockquote class="text-lg text-gray-700 mb-6">
                                "Berkat EduSavings, saya bisa memantau perkembangan tabungan kuliah saya dengan mudah. Fitur
                                visualisasinya sangat membantu!"
                            </blockquote>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4 border-2 border-blue-100">
                                    <img src="https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?auto=compress&cs=tinysrgb&w=80"
                                        alt="Dian Puspita" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Dian Puspita</h4>
                                    <p class="text-sm text-gray-600">Siswa SMA Kelas 12</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 max-w-2xl w-full">
                            <svg class="w-10 h-10 text-blue-500 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                            <blockquote class="text-lg text-gray-700 mb-6">
                                "Saya merasa tenang karena bisa memantau tabungan anak secara real-time. Notifikasi dan
                                laporan
                                sangat membantu!"
                            </blockquote>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4 border-2 border-blue-100">
                                    <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&w=80"
                                        alt="Budi Santoso" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Budi Santoso</h4>
                                    <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 max-w-2xl w-full">
                            <svg class="w-10 h-10 text-blue-500 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>
                            <blockquote class="text-lg text-gray-700 mb-6">
                                "Sebagai guru, saya sangat terbantu dengan fitur laporan otomatis yang memudahkan pemantauan
                                tabungan siswa."
                            </blockquote>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4 border-2 border-blue-100">
                                    <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=80"
                                        alt="Siti Rahayu" class="w-full h-full object-cover" />
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Siti Rahayu</h4>
                                    <p class="text-sm text-gray-600">Guru BK</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-6 space-x-3">
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-600 transition-colors"
                    aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-600 transition-colors"
                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-600 transition-colors"
                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>

            <button type="button"
                class="absolute top-1/2 left-4 z-10 flex items-center justify-center w-10 h-10 bg-white/50 rounded-full shadow hover:bg-white/80 transition-colors group focus:outline-none"
                data-carousel-prev>
                <svg class="w-5 h-5 text-blue-600 group-hover:text-blue-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button type="button"
                class="absolute top-1/2 right-4 z-10 flex items-center justify-center w-10 h-10 bg-white/50 rounded-full shadow hover:bg-white/80 transition-colors group focus:outline-none"
                data-carousel-next>
                <svg class="w-5 h-5 text-blue-600 group-hover:text-blue-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const carousel = document.querySelector('[data-carousel="slide"]');
                const items = carousel.querySelectorAll('[data-carousel-item]');
                const indicators = carousel.querySelectorAll('[data-carousel-slide-to]');
                const prevButton = carousel.querySelector('[data-carousel-prev]');
                const nextButton = carousel.querySelector('[data-carousel-next]');

                let currentIndex = 0;
                const totalItems = items.length;

                function showSlide(index) {
                    items.forEach((item, i) => {
                        item.classList.toggle('hidden', i !== index);
                    });

                    indicators.forEach((indicator, i) => {
                        indicator.setAttribute('aria-current', i === index);
                        indicator.classList.toggle('bg-blue-600', i === index);
                        indicator.classList.toggle('bg-gray-300', i !== index);
                    });
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % totalItems;
                    showSlide(currentIndex);
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                    showSlide(currentIndex);
                }

                prevButton.addEventListener('click', prevSlide);
                nextButton.addEventListener('click', nextSlide);

                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => {
                        currentIndex = index;
                        showSlide(currentIndex);
                    });
                });

                let interval = setInterval(nextSlide, 5000);

                carousel.addEventListener('mouseenter', () => clearInterval(interval));
                carousel.addEventListener('mouseleave', () => interval = setInterval(nextSlide, 5000));

                // Initialize
                showSlide(0);
            });
        </script>

        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-4 md:px-6">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 md:p-12 shadow-xl">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Mulai Perjalanan Menabung yang Cerdas
                        </h2>
                        <p class="text-lg text-blue-100 mb-8">Bergabunglah bersama ribuan siswa yang telah mengamankan masa
                            depan pendidikan mereka. Daftar sekarang dan dapatkan bonus tabungan awal!</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('login.guru') }}"
                                class="px-8 py-3 bg-white text-blue-700 font-medium rounded-lg hover:bg-gray-100 transition-colors shadow-md flex items-center justify-center">
                                Daftar Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-arrow-right ml-2 h-5 w-5">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-white text-black pt-16 pb-8">
            <div class="container mx-auto px-4 md:px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    <div>
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-piggy-bank h-8 w-8 text-blue-400">
                                <path
                                    d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2h0V5z">
                                </path>
                                <path d="M2 9v1c0 1.1.9 2 2 2h1"></path>
                                <path d="M16 11h0"></path>
                            </svg>
                            <span class="ml-2 text-xl font-bold">EduSavings</span>
                        </div>
                        <p class="text-black mb-6">
                            Platform tabungan digital untuk siswa yang aman, transparan, dan membangun kebiasaan finansial
                            yang sehat sejak dini.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-facebook h-5 w-5">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>
                            <a href="#"
                                class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-blue-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter h-5 w-5">
                                    <path
                                        d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-instagram h-5 w-5">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                                    </rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                </svg>
                            </a>
                            <a href="#"
                                class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube h-5 w-5">
                                    <path
                                        d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17">
                                    </path>
                                    <path d="m10 15 5-3-5-3z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Kolom lainnya -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                        <ul class="space-y-3">
                            <li><a href="#beranda" class="text-black hover:text-blue-500 transition-colors">Beranda</a>
                            </li>
                            <li><a href="#tentang-kami" class="text-black hover:text-blue-500 transition-colors">Tentang
                                    Kami</a></li>
                            <li><a href="#fitur" class="text-black hover:text-blue-500 transition-colors">Fitur</a></li>
                            <li><a href="#harga" class="text-black hover:text-blue-500 transition-colors">Harga</a></li>
                            <li><a href="#cara-kerja" class="text-black hover:text-blue-500 transition-colors">Cara
                                    Kerja</a></li>
                            <li><a href="#faq" class="text-black hover:text-blue-500 transition-colors">FAQ</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Layanan</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-black hover:text-blue-500 transition-colors">Tabungan
                                    Pendidikan</a></li>
                            <li><a href="#" class="text-black hover:text-blue-500 transition-colors">Tabungan
                                    Rutin</a></li>
                            <li><a href="#" class="text-black hover:text-blue-500 transition-colors">Laporan
                                    Keuangan</a></li>
                            <li><a href="#" class="text-black hover:text-blue-500 transition-colors">Konsultasi</a>
                            </li>
                            <li><a href="#" class="text-black hover:text-blue-500 transition-colors">Program
                                    Sekolah</a></li>
                            <li><a href="#" class="text-black hover:text-blue-500 transition-colors">Edukasi
                                    Finansial</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                        <ul class="space-y-3 text-black">
                            <li class="flex items-start">
                                <svg class="lucide lucide-map-pin h-10 w-10 text-blue-400 mr-3 mt-0.5"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span>Jl. Veteran No.1A, RT.005/RW.002, Babakan, Kec. Tangerang, Kota Tangerang, Banten
                                    15118</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="lucide lucide-phone h-5 w-5 text-blue-400 mr-3"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </svg>
                                <a href="tel:+44 7723 442982"
                                    class="text-black hover:text-blue-500 transition-colors">+447723442982</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="lucide lucide-mail h-5 w-5 text-blue-400 mr-3"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </svg>
                                <a href="mailto:info@EduSavings.id"
                                    class="text-black hover:text-blue-500 transition-colors">info@EduSavings.id</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-300 text-center md:flex md:justify-between md:items-center">
                    <p class="text-black mb-4 md:mb-0">© 2025 EduSavings. Hak Cipta Dilindungi.</p>
                    <div class="flex flex-wrap justify-center md:justify-end gap-4">
                        <a href="#" class="text-black hover:text-blue-500 transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="text-black hover:text-blue-500 transition-colors">Syarat &amp;
                            Ketentuan</a>
                        <a href="#" class="text-black hover:text-blue-500 transition-colors">Peta Situs</a>
                    </div>
                </div>

                <div class="text-center py-4 border-t border-gray-300 mt-4">
                    <p class="text-black text-sm">
                        Created with <span class="text-red-500">♥</span> by
                        <a href="#" target="_blank"
                            class="text-blue-500 hover:text-blue-400 transition-colors font-semibold">CarlesWebDev</a>
                    </p>
                </div>
            </div>
        </footer>

    </body>
    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        function toggleModal(show) {
            const modal = document.getElementById('roleModal');
            if (show) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        }
    </script>

    </html>
@endsection
