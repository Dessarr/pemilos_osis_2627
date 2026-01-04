@extends('layouts.app')

@section('title', 'Login - Pemilihan OSIS 2025')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#dedede] via-[#e8e8e8] to-[#f0f0f0] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-[#4551ff] to-[#ffd45e] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Login</h2>
            </div>
            
            <form action="{{ route('siswa.login') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">NIS</label>
                    <input type="text" 
                           name="nis" 
                           value="{{ old('nis') }}"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4551ff] focus:border-transparent outline-none transition">
                    @error('nis') 
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" 
                           name="password" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4551ff] focus:border-transparent outline-none transition">
                    @error('password') 
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                    @enderror
                </div>

                @if(session('error'))
                    <div class="bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <button type="submit" 
                        class="w-full bg-[#4551ff] hover:bg-[#3540e6] text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 shadow-md">
                    Masuk
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800 underline text-sm">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

