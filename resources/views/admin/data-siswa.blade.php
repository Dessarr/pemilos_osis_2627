@extends('layouts.admin')

@section('title', 'Data Siswa - Admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Data Siswa</h1>
            <p class="text-gray-600 text-sm">Kelola data siswa yang terdaftar dalam sistem pemilihan</p>
        </div>
    </div>

    @livewire('admin.data-siswa')
</div>
@endsection

