@extends('layouts.app')

@section('title', 'Pemilihan Ketua & Wakil')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#dedede] via-[#e8e8e8] to-[#f0f0f0] relative overflow-hidden">
    <!-- Particle Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-2 h-2 bg-[#4551ff] rounded-full opacity-30 animate-pulse"
            style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-20 w-3 h-3 bg-[#ffd45e] rounded-full opacity-20 animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-32 left-1/4 w-2 h-2 bg-[#4551ff] rounded-full opacity-25 animate-pulse"
            style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 right-1/3 w-4 h-4 bg-[#ffd45e] rounded-full opacity-15 animate-pulse"
            style="animation-delay: 0.5s;"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 py-12 md:py-20">
        <!-- Hero Section -->
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4" style="color: #1a1a1a;">
                Pemilihan Ketua & Wakil
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                Gunakan NIS Anda untuk berpartisipasi dalam menentukan pemimpin masa depan sekolah
            </p>
        </div>

        <!-- Login Form -->
        <div class="max-w-md mx-auto">
            <div
                class="bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:shadow-2xl animate-fade-in">
                <div class="text-center mb-6">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-[#4551ff] to-[#ffd45e] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Login Siswa</h2>
                    <p class="text-gray-600 text-sm">Masuk dengan NIS dan password</p>
                </div>

                <!-- Login Form -->
                <form action="{{ route('siswa.login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Masukkan NIS" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4551ff] focus:border-transparent outline-none transition">
                        @error('nama')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" placeholder="Masukkan NISN" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4551ff] focus:border-transparent outline-none transition">
                        @error('password')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Masukkan NIS sebagai Nama dan NISN sebagai Password</p>
                    </div>

                    @if(session('error'))
                    <div
                        class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm animate-fade-in-error">
                        {{ session('error') }}
                    </div>
                    @endif

                    <button type="submit"
                        class="w-full bg-[#4551ff] hover:bg-[#3540e6] text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 shadow-md">
                        Masuk sebagai Siswa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out forwards;
    opacity: 0;
}

@keyframes fade-in-error {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-error {
    animation: fade-in-error 0.3s ease-out;
}
</style>
@endsection