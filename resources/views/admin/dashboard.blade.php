@extends('layouts.admin')

@section('title', 'Admin Dashboard - Pemilihan OSIS 2025')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Admin Dashboard</h1>
            <p class="text-gray-600 text-sm">Kelola dan pantau hasil pemilihan OSIS 2025</p>
        </div>
    </div>

    @livewire('admin.dashboard')
</div>
@endsection

