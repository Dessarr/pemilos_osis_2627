@extends('layouts.app')

@section('title', 'Pilih Kandidat - Pemilihan OSIS 2025')

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

            <!-- Title Center (Mobile) -->
            <div class="flex-1 text-left md:hidden lg:hidden px-4" style="font-family: 'Poppins', sans-serif;">
                <h1 class="text-sm font-bold text-gray-900">OSIS SMKN 1</h1>
                <p class="text-xs text-gray-600">KOTA BEKASI</p>
            </div>

            <!-- User Info & Logout -->
            <div class="flex items-center gap-4">
                @auth('siswa')
                <span class="text-[12px] md:text-xs text-gray-700 font-medium"
                    style="font-family: 'Poppins', sans-serif;">
                    {{ Auth::guard('siswa')->user()->nama }}
                </span>
                @endauth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-2 py-2 text-sm font-medium text-gray-700 hover:text-amber-600 transition-colors duration-300"
                        style="font-family: 'Lora', serif;">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="bg-[#FEF9E7] py-2 px-4">
    <div class="container mx-auto max-w-7xl">
        <!-- Kandidat Cards -->
        @livewire('kandidat')
    </div>
</div>


<!-- Footer -->
<footer class="bg-linear-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-12 w-full"
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

@push('scripts')
<style>
/* Aturan konsisten untuk ukuran dan posisi frame */
.paslon-container {
    position: relative;
    width: 100%;
    max-width: 100%;
    overflow: visible;
}

/* Foto Formal/Unformal - Ukuran konsisten, sama untuk semua */
.paslon-1-formal,
.paslon-1-unformal,
.paslon-2-formal,
.paslon-2-unformal {
    width: 100% !important;
    height: 100% !important;
    max-width: 100% !important;
    max-height: 100% !important;
    object-fit: contain !important;
    object-position: center !important;
}

/* Aturan konsisten untuk ukuran dan posisi frame */
.carousel-img {
    transition: opacity 1s ease-in-out;
    width: 100%;
    height: auto;
    object-fit: cover;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function initCarousel() {
        // Carousel untuk setiap paslon
        const paslonContainers = document.querySelectorAll('[data-paslon-id]');

        paslonContainers.forEach(function(container) {
            const paslonId = container.getAttribute('data-paslon-id');
            const formalImg = container.querySelector('.paslon-' + paslonId + '-formal');
            const unformalImg = container.querySelector('.paslon-' + paslonId + '-unformal');

            if (!formalImg || !unformalImg) return;

            let isFormal = true;

            // Clear any existing interval
            if (formalImg.dataset.intervalId) {
                clearInterval(parseInt(formalImg.dataset.intervalId));
            }

            const intervalId = setInterval(function() {
                if (isFormal) {
                    formalImg.style.opacity = '0';
                    unformalImg.style.opacity = '1';
                } else {
                    formalImg.style.opacity = '1';
                    unformalImg.style.opacity = '0';
                }
                isFormal = !isFormal;
            }, 5500);

            formalImg.dataset.intervalId = intervalId;
        });
    }

    // Initialize on page load
    initCarousel();

    // Re-initialize after Livewire updates
    document.addEventListener('livewire:load', initCarousel);
    document.addEventListener('livewire:update', initCarousel);
});
</script>
@endpush
@endsection