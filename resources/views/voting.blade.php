@extends('layouts.app')

@section('title', 'Voting - Pemilihan OSIS 2025')

@section('content')
<div class="min-h-screen bg-[#dedede] py-8 px-4">
    <div class="container mx-auto max-w-2xl">
        @livewire('voting', ['kandidatId' => $kandidatId])
    </div>
</div>
@endsection

