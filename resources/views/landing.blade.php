@extends('layouts.app')

@section('title', 'Pemilihan Ketua & Wakil')

@section('content')
<!-- Navbar -->
<nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo & Brand -->
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 rounded-xl flex items-center justify-center bg-gradient-to-br from-amber-50 to-amber-100 shadow-sm ring-1 ring-amber-200/50">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo OSIS" class="w-10 h-10 object-contain">
                </div>
                <div class="hidden md:block" style="font-family: 'Poppins', sans-serif;">
                    <h1 class="text-lg font-bold text-gray-900">OSIS SMKN 1</h1>
                    <p class="text-xs text-gray-500 font-medium">KOTA BEKASI</p>
                </div>
            </div>

            <!-- Navigation Links (Center) -->
            <div class="hidden lg:flex items-center gap-8" style="font-family: 'Lora', serif;">
                <a href="#beranda"
                    class="nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Beranda
                </a>
                <a href="#tentang"
                    class="nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Tentang
                </a>
                <a href="#prinsip"
                    class="nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Prinsip
                </a>
                <a href="#inspirasi"
                    class="nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Inspirasi
                </a>
                <a href="#kontak"
                    class="nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Kontak
                </a>
            </div>

            <!-- Title Center (Mobile) -->
            <div class="flex-1 text-left px-4 md:hidden lg:hidden" style="font-family: 'Poppins', sans-serif;">
                <h1 class="text-sm font-bold text-gray-900">OSIS SMKN 1</h1>
                <p class="text-xs text-gray-600">KOTA BEKASI</p>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn"
                class="lg:hidden text-gray-600 hover:text-amber-600 transition-colors duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t border-gray-100 mt-4">
            <div class="flex flex-col gap-4 pt-4" style="font-family: 'Lora', serif;">
                <a href="#beranda"
                    class="mobile-nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Beranda
                </a>
                <a href="#tentang"
                    class="mobile-nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Tentang
                </a>
                <a href="#prinsip"
                    class="mobile-nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Prinsip
                </a>
                <a href="#inspirasi"
                    class="mobile-nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Inspirasi
                </a>
                <a href="#kontak"
                    class="mobile-nav-link text-sm text-gray-600 hover:text-amber-600 transition-colors duration-300 font-light">
                    Kontak
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section - Full Height -->
<section id="beranda" class="relative min-h-screen flex items-center justify-center"
    style="background: linear-gradient(to bottom right, #fef9e7, #fef3c7);">
    <div class="container mx-auto px-4 lg:px-8 py-20">
        <div class="max-w-5xl mx-auto text-center space-y-12">
            <!-- Hero Text -->
            <div class="space-y-4">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight tracking-tight"
                    style="font-family: 'Poppins', sans-serif;">
                    Pemilihan Ketua & Wakil
                </h1>
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-amber-600 leading-tight tracking-tight"
                    style="font-family: 'Poppins', sans-serif;">
                    OSIS 2026/2027
                </h2>
            </div>

            <!-- Description -->
            <p class="text-base md:text-lg text-gray-700 leading-relaxed max-w-xl mx-auto"
                style="font-family: 'Lora', serif;">
                Suara Anda menentukan masa depan sekolah. Pilih pemimpin yang visioner dan berkarakter.
            </p>

            <!-- CTA Button -->
            <div class="pt-4">
                <a href="{{ route('login') }}"
                    class="inline-block bg-gray-900 hover:bg-amber-600 text-white px-10 py-4 text-xs font-medium tracking-widest uppercase transition-all duration-300 btn-bounce btn-pulse-glow cursor-pointer"
                    style="font-family: 'Lora', serif; letter-spacing: 0.2em;">
                    PILIH PEMIMPIN MU
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Peran OSIS & Kenapa Pemilos Section -->
<section id="tentang" class="bg-white py-24 lg:py-32 fade-in-up" style="font-family: 'Lora', serif;">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 lg:gap-16">
                <!-- Peran OSIS -->
                <div class="pt-8 pb-4 group">
                    <div
                        class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                    </div>
                    <div class="flex items-start gap-4 mb-8">
                        <div
                            class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                            <svg class="w-4 h-4 text-amber-600 transition-colors duration-300 group-hover:text-amber-700"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-light text-gray-900 tracking-tight"
                            style="font-family: 'Playfair Display', serif;">
                            Peran dan Fungsi OSIS
                        </h2>
                    </div>
                    <div class="space-y-6 pl-12">
                        <p class="text-base md:text-lg text-gray-600 leading-relaxed font-light">
                            Organisasi Siswa Intra Sekolah (OSIS) merupakan wadah utama pengembangan potensi siswa
                            melalui
                            berbagai kegiatan yang membangun karakter, kepemimpinan, dan kemampuan berorganisasi.
                        </p>
                        <p class="text-base md:text-lg text-gray-600 leading-relaxed font-light">
                            OSIS berperan sebagai jembatan komunikasi antara siswa dengan sekolah, mengorganisir
                            kegiatan
                            kesiswaan, dan mewadahi aspirasi seluruh siswa untuk kemajuan sekolah yang lebih baik.
                        </p>
                    </div>
                </div>

                <!-- Kenapa Pemilos -->
                <div class="pt-8 pb-4 group">
                    <div
                        class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                    </div>
                    <div class="flex items-start gap-4 mb-8">
                        <div
                            class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                            <svg class="w-4 h-4 text-amber-600 transition-colors duration-300 group-hover:text-amber-700"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-light text-gray-900 tracking-tight"
                            style="font-family: 'Playfair Display', serif;">
                            Mengapa Diadakan Pemilos?
                        </h2>
                    </div>
                    <div class="space-y-6 pl-12">
                        <p
                            class="text-base md:text-lg text-gray-600 leading-relaxed font-light transition-colors duration-300 group-hover:text-gray-700">
                            Pemilihan Ketua dan Wakil Ketua OSIS (Pemilos) adalah proses demokrasi yang memberikan
                            kesempatan kepada seluruh siswa untuk memilih pemimpin organisasi secara langsung.
                        </p>
                        <p
                            class="text-base md:text-lg text-gray-600 leading-relaxed font-light transition-colors duration-300 group-hover:text-gray-700">
                            Melalui Pemilos, kita memberikan pembelajaran tentang nilai-nilai demokrasi, tanggung
                            jawab, dan
                            pentingnya partisipasi aktif dalam menentukan masa depan organisasi sekolah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Prinsip Pemilihan (Luberjurdil) Section -->
<section id="prinsip" class="bg-white py-24 lg:py-32 fade-in-up" style="font-family: 'Lora', serif;">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-light text-gray-900 mb-6 tracking-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Prinsip Pemilihan
                </h2>
            </div>

            <!-- Prinsip Items -->
            <div class="space-y-16 lg:space-y-20">
                <!-- Langsung - Kiri -->
                <div class="flex flex-col md:flex-row gap-12 items-start prinsip-item fade-in-up">
                    <div class="w-full md:w-1/2 md:pr-12">
                        <div class="pt-8 pb-4 group">
                            <div
                                class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                            </div>
                            <div class="flex items-start gap-6 mb-6">
                                <div
                                    class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                                    <span
                                        class="text-amber-600 font-light text-sm transition-colors duration-300 group-hover:text-amber-700"
                                        style="font-family: 'Playfair Display', serif;">1</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 tracking-tight transition-colors duration-300 group-hover:text-gray-800"
                                        style="font-family: 'Playfair Display', serif;">
                                        Langsung
                                    </h3>
                                    <p
                                        class="text-base md:text-lg text-gray-600 leading-relaxed font-light transition-colors duration-300 group-hover:text-gray-700">
                                        Pemilihan Ketua OSIS dilakukan dengan cara setiap siswa memberikan suaranya
                                        sendiri
                                        tanpa diwakilkan, sehingga pilihan yang diberikan benar-benar berasal dari
                                        kehendak
                                        pribadi pemilih.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 hidden md:block"></div>
                </div>

                <!-- Umum - Kanan -->
                <div class="flex flex-col md:flex-row gap-12 items-start prinsip-item fade-in-up">
                    <div class="w-full md:w-1/2 hidden md:block"></div>
                    <div class="w-full md:w-1/2 md:pl-12">
                        <div class="pt-8 pb-4 text-right md:text-left group">
                            <div
                                class="h-px bg-linear-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                            </div>
                            <div class="flex items-start gap-6 mb-6 md:flex-row-reverse">
                                <div
                                    class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                                    <span
                                        class="text-amber-600 font-light text-sm transition-colors duration-300 group-hover:text-amber-700"
                                        style="font-family: 'Playfair Display', serif;">2</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 tracking-tight"
                                        style="font-family: 'Playfair Display', serif;">
                                        Umum
                                    </h3>
                                    <p class="text-base md:text-lg text-gray-600 leading-relaxed font-light">
                                        Seluruh siswa yang memenuhi ketentuan sebagai pemilih memiliki hak yang sama
                                        untuk ikut
                                        serta dalam pemilihan Ketua OSIS tanpa pengecualian.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bebas - Kiri -->
                <div class="flex flex-col md:flex-row gap-12 items-start prinsip-item fade-in-up">
                    <div class="w-full md:w-1/2 md:pr-12">
                        <div class="pt-8 pb-4 group">
                            <div
                                class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                            </div>
                            <div class="flex items-start gap-6 mb-6">
                                <div
                                    class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                                    <span
                                        class="text-amber-600 font-light text-sm transition-colors duration-300 group-hover:text-amber-700"
                                        style="font-family: 'Playfair Display', serif;">3</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 tracking-tight transition-colors duration-300 group-hover:text-gray-800"
                                        style="font-family: 'Playfair Display', serif;">
                                        Bebas
                                    </h3>
                                    <p
                                        class="text-base md:text-lg text-gray-600 leading-relaxed font-light transition-colors duration-300 group-hover:text-gray-700">
                                        Setiap siswa berhak menentukan pilihannya tanpa adanya tekanan, paksaan, atau
                                        intervensi
                                        dari pihak mana pun di lingkungan sekolah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 hidden md:block"></div>
                </div>

                <!-- Rahasia - Kanan -->
                <div class="flex flex-col md:flex-row gap-12 items-start prinsip-item fade-in-up">
                    <div class="w-full md:w-1/2 hidden md:block"></div>
                    <div class="w-full md:w-1/2 md:pl-12">
                        <div class="pt-8 pb-4 text-right md:text-left group">
                            <div
                                class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                            </div>
                            <div class="flex items-start gap-6 mb-6 md:flex-row-reverse">
                                <div
                                    class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                                    <span
                                        class="text-amber-600 font-light text-sm transition-colors duration-300 group-hover:text-amber-700"
                                        style="font-family: 'Playfair Display', serif;">4</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 tracking-tight transition-colors duration-300 group-hover:text-gray-800"
                                        style="font-family: 'Playfair Display', serif;">
                                        Rahasia
                                    </h3>
                                    <p
                                        class="text-base md:text-lg text-gray-600 leading-relaxed font-light transition-colors duration-300 group-hover:text-gray-700">
                                        Pilihan yang diberikan oleh siswa dijamin kerahasiaannya dan tidak dapat
                                        diketahui oleh
                                        orang lain.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jujur - Kiri -->
                <div class="flex flex-col md:flex-row gap-12 items-start prinsip-item fade-in-up">
                    <div class="w-full md:w-1/2 md:pr-12">
                        <div class="pt-8 pb-4 group">
                            <div
                                class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                            </div>
                            <div class="flex items-start gap-6 mb-6">
                                <div
                                    class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1 transition-all duration-300 group-hover:border-amber-500 group-hover:scale-110">
                                    <span
                                        class="text-amber-600 font-light text-sm transition-colors duration-300 group-hover:text-amber-700"
                                        style="font-family: 'Playfair Display', serif;">5</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 tracking-tight transition-colors duration-300 group-hover:text-gray-800"
                                        style="font-family: 'Playfair Display', serif;">
                                        Jujur
                                    </h3>
                                    <p
                                        class="text-base md:text-lg text-gray-600 leading-relaxed font-light transition-colors duration-300 group-hover:text-gray-700">
                                        Seluruh pihak yang terlibat dalam pemilihan Ketua OSIS wajib bersikap jujur,
                                        baik dalam
                                        proses pencalonan, pemungutan, maupun penghitungan suara.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 hidden md:block"></div>
                </div>

                <!-- Adil - Kanan -->
                <div class="flex flex-col md:flex-row gap-12 items-start prinsip-item fade-in-up">
                    <div class="w-full md:w-1/2 hidden md:block"></div>
                    <div class="w-full md:w-1/2 md:pl-12">
                        <div class="pt-8 pb-4 text-right md:text-left">
                            <div class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8"></div>
                            <div class="flex items-start gap-6 mb-6 md:flex-row-reverse">
                                <div
                                    class="w-8 h-8 rounded-full border border-amber-400 flex items-center justify-center shrink-0 mt-1">
                                    <span class="text-amber-600 font-light text-sm"
                                        style="font-family: 'Playfair Display', serif;">6</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-3xl md:text-4xl font-light text-gray-900 mb-6 tracking-tight"
                                        style="font-family: 'Playfair Display', serif;">
                                        Adil
                                    </h3>
                                    <p class="text-base md:text-lg text-gray-600 leading-relaxed font-light">
                                        Semua calon dan pemilih diperlakukan sama sesuai dengan aturan yang berlaku
                                        tanpa adanya
                                        perlakuan khusus atau diskriminasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kata-Kata Inspiratif Section -->
<section id="inspirasi" class="bg-white py-24 lg:py-32 fade-in-up" style="font-family: 'Lora', serif;">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-light text-gray-900 mb-6 tracking-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Memilih dengan Bijak
                </h2>
            </div>

            <div class="space-y-12 lg:space-y-16">
                <!-- Card 1 -->
                <div class="pt-8 pb-4 group">
                    <div
                        class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                    </div>
                    <p
                        class="text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed font-light max-w-4xl mx-auto">
                        Memilih pemimpin dilakukan dengan <strong class="font-normal text-gray-800">dua cara</strong>:
                        menggunakan pikiran dan menggunakan
                        perasaan.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="pt-8 pb-4 group">
                    <div
                        class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                    </div>
                    <p
                        class="text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed font-light max-w-4xl mx-auto">
                        Pemilihan dengan <strong class="font-normal text-gray-800">pikiran</strong> berlandaskan logika,
                        rekam jejak, visi, misi, dan
                        kapasitas kepemimpinan.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="pt-8 pb-4 group">
                    <div
                        class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent mb-8 transition-all duration-300 group-hover:via-amber-500">
                    </div>
                    <p
                        class="text-base md:text-lg lg:text-xl text-gray-600 leading-relaxed font-light max-w-4xl mx-auto">
                        Pemilihan dengan <strong class="font-normal text-gray-800">perasaan</strong> didorong oleh rasa
                        iba, kekaguman, atau kedekatan
                        emosional yang tidak selalu selaras dengan kebutuhan organisasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="kontak" class="bg-white py-24 lg:py-32 fade-in-up" style="font-family: 'Lora', serif;">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-light text-gray-900 mb-6 tracking-tight"
                    style="font-family: 'Playfair Display', serif;">
                    Hubungi Kami
                </h2>
            </div>

            <div class="max-w-5xl mx-auto grid grid-cols-3 gap-2 md:gap-8">
                <!-- Instagram Card -->
                <a href="https://www.instagram.com/osis_smkn1bks/" target="_blank" rel="noopener noreferrer"
                    class="group relative block cursor-pointer" style="aspect-ratio: 3/4;">
                    <div class="absolute inset-0 rounded-lg md:rounded-2xl p-[1px] md:p-[2px]"
                        style="background: linear-gradient(135deg, #D97706, #F59E0B, #FCD34D);">
                        <div
                            class="w-full h-full bg-white rounded-lg md:rounded-2xl flex flex-col justify-center items-center p-3 md:p-8 shadow-lg group-hover:shadow-xl group-hover:scale-[1.02] transition-all duration-300">
                            <div
                                class="w-10 h-10 md:w-16 md:h-16 mx-auto mb-2 md:mb-6 rounded-full bg-gradient-to-br from-amber-600 via-amber-500 to-amber-400 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 md:w-8 md:h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                                </svg>
                            </div>
                            <h3 class="text-xs md:text-xl font-bold text-gray-900 mb-1 md:mb-2 group-hover:text-amber-600 transition-colors duration-300"
                                style="font-family: 'Playfair Display', serif;">
                                Instagram
                            </h3>
                            <p
                                class="text-[10px] md:text-base text-gray-600 group-hover:text-gray-800 transition-colors duration-300">
                                @osissmkn1bekasi</p>
                        </div>
                    </div>
                </a>

                <!-- TikTok Card -->
                <a href="https://www.tiktok.com/@osis_smkn1bks" target="_blank" rel="noopener noreferrer"
                    class="group relative block cursor-pointer" style="aspect-ratio: 3/4;">
                    <div class="absolute inset-0 rounded-lg md:rounded-2xl p-[1px] md:p-[2px]"
                        style="background: linear-gradient(135deg, #D97706, #F59E0B, #FCD34D);">
                        <div
                            class="w-full h-full bg-white rounded-lg md:rounded-2xl flex flex-col justify-center items-center p-3 md:p-8 shadow-lg group-hover:shadow-xl group-hover:scale-[1.02] transition-all duration-300">
                            <div
                                class="w-10 h-10 md:w-16 md:h-16 mx-auto mb-2 md:mb-6 rounded-full bg-gradient-to-br from-amber-600 via-amber-500 to-amber-400 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 md:w-8 md:h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z" />
                                </svg>
                            </div>
                            <h3 class="text-xs md:text-xl font-bold text-gray-900 mb-1 md:mb-2 group-hover:text-amber-600 transition-colors duration-300"
                                style="font-family: 'Playfair Display', serif;">
                                TikTok
                            </h3>
                            <p
                                class="text-[10px] md:text-base text-gray-600 group-hover:text-gray-800 transition-colors duration-300">
                                @osissmkn1bekasi</p>
                        </div>
                    </div>
                </a>

                <!-- Email Card -->
                <a href="mailto:osis.smkn1kotabekasi@gmail.com" class="group relative block cursor-pointer"
                    style="aspect-ratio: 3/4;">
                    <div class="absolute inset-0 rounded-lg md:rounded-2xl p-[1px] md:p-[2px]"
                        style="background: linear-gradient(135deg, #D97706, #F59E0B, #FCD34D);">
                        <div
                            class="w-full h-full bg-white rounded-lg md:rounded-2xl flex flex-col justify-center items-center p-3 md:p-8 shadow-lg group-hover:shadow-xl group-hover:scale-[1.02] transition-all duration-300">
                            <div
                                class="w-10 h-10 md:w-16 md:h-16 mx-auto mb-2 md:mb-6 rounded-full bg-gradient-to-br from-amber-600 via-amber-500 to-amber-400 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 md:w-8 md:h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xs md:text-xl font-bold text-gray-900 mb-1 md:mb-2 group-hover:text-amber-600 transition-colors duration-300"
                                style="font-family: 'Playfair Display', serif;">
                                Email
                            </h3>
                            <p
                                class="text-[9px] md:text-sm break-all group-hover:text-gray-800 transition-colors duration-300 px-1">
                                osis.smkn1kotabekasi@gmail.com</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-12"
    style="font-family: 'Lora', serif;">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8 mb-8">
            <!-- About -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 rounded-lg flex items-center justify-center bg-amber-500/20 ring-1 ring-amber-500/30">
                        <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                    </div>
                    <h3 class="text-lg font-bold" style="font-family: 'Poppins', sans-serif;">OSIS SMKN 1</h3>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Organisasi Siswa Intra Sekolah yang berkomitmen membangun sekolah yang lebih baik melalui
                    program-program inovatif dan berkarakter.
                </p>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-bold mb-4" style="font-family: 'Playfair Display', serif;">Kontak</h3>
                <div class="space-y-2 text-gray-400 text-sm">
                    <a href="mailto:osis.smkn1kotabekasi@gmail.com"
                        class="flex items-center gap-2 hover:text-amber-400 transition-colors duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        osis.smkn1kotabekasi@gmail.com
                    </a>
                    <a href="https://www.instagram.com/osis_smkn1bks/" target="_blank" rel="noopener noreferrer"
                        class="flex items-center gap-2 hover:text-amber-400 transition-colors duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @osissmkn1bekasi
                    </a>
                    <a href="https://www.instagram.com/dessarrukmana/" target="_blank" rel="noopener noreferrer"
                        class="flex items-center gap-2 hover:text-amber-400 transition-colors duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @dessarrukmana
                    </a>
                </div>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-lg font-bold mb-4" style="font-family: 'Playfair Display', serif;">Ikuti Kami</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="https://www.tiktok.com/@osis_smkn1bks" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-700/50 hover:bg-amber-600 text-gray-300 hover:text-white transition-all duration-300 hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/osis_smkn1bks/" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-700/50 hover:bg-amber-600 text-gray-300 hover:text-white transition-all duration-300 hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                        </svg>
                    </a>
                    <a href="https://x.com/OSIS_smkn1bks" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-700/50 hover:bg-amber-600 text-gray-300 hover:text-white transition-all duration-300 hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700/50 mt-8 pt-8 text-center">
            <p class="text-gray-400 text-sm">
                &copy; 2026 OSIS SMKN 1 KOTA BEKASI. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<script>
// Smooth Scroll untuk Navigation Links
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll untuk semua nav links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80; // Offset untuk navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });

                // Close mobile menu jika terbuka
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });
    });

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Active Navigation Link on Scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');

    function updateActiveNav() {
        const scrollY = window.pageYOffset;

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('text-amber-600', 'font-medium');
                    link.classList.add('text-gray-600', 'font-light');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.remove('text-gray-600', 'font-light');
                        link.classList.add('text-amber-600', 'font-medium');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav(); // Initial call

    // Scroll Animation dengan Intersection Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe semua section dengan class fade-in-up
    document.querySelectorAll('.fade-in-up').forEach(section => {
        observer.observe(section);
    });

    // Stagger animation untuk items di dalam section Prinsip Pemilihan
    const prinsipItems = document.querySelectorAll('.prinsip-item');
    prinsipItems.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.15}s`;
        observer.observe(item);
    });
});
</script>

@endsection