@extends('layouts.app')

@section('title', 'Pemilihan Ketua & Wakil')

@section('content')
<!-- Navbar -->
<nav class="bg-amber-300 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-lg flex items-center justify-center bg-linear-to-br">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Title Center -->
            <div class="flex-1 text-center">
                <h1 class="text-xl font-bold text-gray-800">OSIS SMKN 1 KOTA BEKASI</h1>
            </div>

            <!-- Login Button -->
            <div>
                <a href="{{ route('login') }}"
                    class="bg-amber-200 hover:bg-amber-400 text-gray-800 px-6 py-2 rounded-lg font-semibold transition">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section with Carousel -->
<div class="bg-linear-to-br from-amber-200 via-amber-300 to-amber-400 py-12">
    <div class="container mx-auto px-4">
        <!-- Carousel -->
        <div class="max-w-4xl mx-auto mb-12">
            <div id="carousel" class="relative overflow-hidden rounded-2xl shadow-2xl" style="height: 400px;">
                <!-- Slide 1 -->
                <div class="carousel-slide absolute inset-0 transition-opacity duration-500 opacity-100">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200&h=400&fit=crop"
                        alt="Kegiatan OSIS" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-8 text-white">
                            <h3 class="text-2xl font-bold mb-2">Kegiatan Kepemimpinan</h3>
                            <p class="text-lg">Membangun karakter pemimpin masa depan</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-slide absolute inset-0 transition-opacity duration-500 opacity-0">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200&h=400&fit=crop"
                        alt="Kegiatan OSIS" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-8 text-white">
                            <h3 class="text-2xl font-bold mb-2">Gotong Royong</h3>
                            <p class="text-lg">Bersama membangun sekolah yang lebih baik</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-slide absolute inset-0 transition-opacity duration-500 opacity-0">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&h=400&fit=crop"
                        alt="Kegiatan OSIS" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-8 text-white">
                            <h3 class="text-2xl font-bold mb-2">Kreativitas & Inovasi</h3>
                            <p class="text-lg">Mengembangkan potensi siswa secara maksimal</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                    <button class="carousel-dot w-3 h-3 rounded-full bg-white opacity-100" data-slide="0"></button>
                    <button class="carousel-dot w-3 h-3 rounded-full bg-white opacity-50" data-slide="1"></button>
                    <button class="carousel-dot w-3 h-3 rounded-full bg-white opacity-50" data-slide="2"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quotes Section -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <div class="bg-background rounded-xl p-8 shadow-lg">
                <p class="text-xl text-gray-700 italic">"Pemimpin yang baik adalah mereka yang melayani, bukan yang
                    dilayani."</p>
                <p class="text-sm text-gray-600 mt-2">- Kepemimpinan Sejati</p>
            </div>

            <div class="bg-secondary rounded-xl p-8 shadow-lg">
                <p class="text-xl text-gray-800 italic">"Bersama kita bisa, bersama kita maju, bersama kita
                    berprestasi!"</p>
                <p class="text-sm text-gray-700 mt-2">- Semangat OSIS</p>
            </div>

            <div class="bg-primary rounded-xl p-8 shadow-lg">
                <p class="text-xl text-white italic">"Pendidikan bukan hanya di dalam kelas, tapi juga di organisasi
                    yang membentuk karakter."</p>
                <p class="text-sm text-gray-200 mt-2">- Visi OSIS SMKN 1 Kota Bekasi</p>
            </div>

            <div class="bg-background rounded-xl p-8 shadow-lg">
                <p class="text-xl text-gray-700 italic">"Suara Anda menentukan masa depan sekolah. Gunakan hak pilih
                    Anda dengan bijak!"</p>
                <p class="text-sm text-gray-600 mt-2">- Pemilihan OSIS 2025</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-bold mb-4">OSIS SMKN 1 KOTA BEKASI</h3>
                <p class="text-gray-400 text-sm">Organisasi Siswa Intra Sekolah yang berkomitmen membangun sekolah yang
                    lebih baik.</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">Kontak</h3>
                <p class="text-gray-400 text-sm">Email: osis@smkn1bekasi.sch.id</p>
                <p class="text-gray-400 text-sm">Instagram : @rukmanadessar</p>
                <p class="text-gray-400 text-sm">Telp: (021) 12345678</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Instagram</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Twitter</a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; 2025 OSIS SMKN 1 KOTA BEKASI. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
// Carousel Auto Slide
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');
const dots = document.querySelectorAll('.carousel-dot');
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.opacity = i === index ? '1' : '0';
    });
    dots.forEach((dot, i) => {
        dot.style.opacity = i === index ? '1' : '0.5';
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

// Auto slide every 5 seconds
setInterval(nextSlide, 5000);

// Dot navigation
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index;
        showSlide(currentSlide);
    });
});
</script>
@endsection