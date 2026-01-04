@extends('layouts.app')

@section('title', 'Pilih Kandidat - Pemilihan OSIS 2025')

@section('content')
<div class="min-h-screen bg-[#dedede] py-8 px-4">
    <div class="container mx-auto max-w-6xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Pilih Kandidat Anda</h1>
            <p class="text-gray-600">Pilih salah satu paslon untuk melanjutkan voting</p>
        </div>

        <!-- Kandidat Cards -->
        @livewire('kandidat')

        <!-- Logout Button -->
        <div class="text-center mt-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-600 hover:text-gray-800 underline">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

