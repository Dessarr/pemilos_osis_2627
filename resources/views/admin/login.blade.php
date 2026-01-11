@extends('layouts.app')

@section('title', 'Login Admin - Pemilihan OSIS 2025')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#dedede] via-[#e8e8e8] to-[#f0f0f0] relative overflow-hidden">
    <!-- Particle Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-2 h-2 bg-[#ffd45e] rounded-full opacity-30 animate-pulse" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 right-20 w-3 h-3 bg-[#4551ff] rounded-full opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-32 left-1/4 w-2 h-2 bg-[#ffd45e] rounded-full opacity-25 animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative z-10 container mx-auto px-4 py-12 md:py-20">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-all duration-300 hover:shadow-2xl animate-fade-in">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-[#ffd45e] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Login Admin</h2>
                    <p class="text-gray-600 text-sm">Akses dashboard admin</p>
                </div>
                @livewire('admin.login-admin')
                
                <div class="mt-4 text-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800 underline text-sm">
                        Kembali ke Beranda
                    </a>
                </div>
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

