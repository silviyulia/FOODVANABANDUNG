@extends('layouts.app2')

@section('title', 'Profil - FoodVana Bandung')

@section('content')
<div class="container mt-5 bg-light rounded p-2 shadow-sm">
    @if(session('user'))
    @php
        $user = session('user');
    @endphp
    <div class="row align-items-center">
        <!-- Foto Profil -->
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ !empty($user['profile_photo']) ? asset($user['profile_photo']) : asset('img/gprofile.jpg') }}" 
                 class="rounded-circle border border-secondary" width="170" height="170" alt="Foto Profil">
        </div>

       
        <!-- Info Pengguna -->
        <div class="col-md-8">
            
            <h3><strong>Nama:</strong> {{ $user['username'] ?? $user['name'] }}</h3>
            <p class="text-muted mb-1"><strong>Email:</strong> {{ $user['email'] }}</p>
            <p><strong>Alamat:</strong> {{ $user['alamat'] ?? '-' }}</p>
            <p><strong>No. HP:</strong> {{ $user['no_hp'] ?? '-' }}</p>
            <div class="mt-3 text-end">
                <a href="{{ route('profil.edit') }}" class="btn btn-primary">Edit Profil</a>
            </div>
            <div class="mt-2 text-end">
                <a href="{{ route('logout') }}" class="btn btn-secondary">logout</a>    
        </div>
    </div>
    @else
    <div class="alert alert-danger text-center mt-4">Data user tidak ditemukan. Silakan login ulang.</div>
    @endif
</div>
@endsection
