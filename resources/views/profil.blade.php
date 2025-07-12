@extends('layouts.app2')

@section('title', 'Profil - FoodVana Bandung')

@section('content')
<div class="container mt-5">
    @if(session('user'))
        @php $user = session('user'); @endphp
        <div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
            <div class="row g-4 align-items-center">
                <!-- Foto Profil -->
                <div class="col-md-4 text-center">
                    <img src="{{ !empty($user['profile_photo']) ? asset($user['profile_photo']) : asset('img/gprofile.jpg') }}"
                         class="img-fluid rounded-circle border border-3 border-primary shadow-sm"
                         width="180" height="180" alt="Foto Profil">
                    <h5 class="mt-3 fw-semibold">{{ $user['username'] ?? $user['name'] }}</h5>
                    <!-- <span class="badge bg-secondary">Pengguna Aktif</span> -->
                </div>

                <!-- Info Pengguna -->
                <div class="col-md-8">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $user['email'] }}</li>
                        <li class="list-group-item"><strong>Alamat:</strong> {{ $user['alamat'] ?? '-' }}</li>
                        <li class="list-group-item"><strong>No. HP:</strong> {{ $user['no_hp'] ?? '-' }}</li>
                    </ul>
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('profil.edit') }}" class="btn btn-outline-primary">
                            <i class="bi bi-pencil-square"></i> Edit Profil
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-triangle-fill"></i> Data user tidak ditemukan. Silakan login ulang.
        </div>
    @endif
</div>
<!-- <div class="mt-2 text-center">
    <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31911.81672122134!2d103.98026757631591!3d1.1765926372670685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da2758035e2c13%3A0xa572c49d1f121dee!2sTj.%20Sengkuang%2C%20Kec.%20Batu%20Ampar%2C%20Kota%20Batam%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1750941437032!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" object-fit="cover"></iframe>
            </div> -->
@endsection

