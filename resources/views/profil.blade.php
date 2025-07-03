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
                <a href="{{ route('profil.edit') }}" class="btn btn-secondary">Edit Profil</a>
            </div>
            <div class="mt-2 text-end">
                <a href="{{ route('logout') }}" class="btn btn-primary">logout</a>    
        </div>
        
    </div>
    @else
    <div class="alert alert-danger text-center mt-4">Data user tidak ditemukan. Silakan login ulang.</div>
    @endif
</div>
<!-- <div class="mt-2 text-center">
    <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31911.81672122134!2d103.98026757631591!3d1.1765926372670685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da2758035e2c13%3A0xa572c49d1f121dee!2sTj.%20Sengkuang%2C%20Kec.%20Batu%20Ampar%2C%20Kota%20Batam%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1750941437032!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" object-fit="cover"></iframe>
            </div> -->
@endsection

