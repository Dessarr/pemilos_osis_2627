@extends('layouts.app')

@section('title', 'Admin Dashboard - Pemilihan OSIS 2025')

@section('content')
<div class="min-h-screen bg-[#dedede] py-8 px-4">
    <div class="container mx-auto max-w-7xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>

        @livewire('admin.dashboard')
    </div>
</div>
@endsection

