@extends('layouts.app2')

@section('title', 'Profil - FoodVana Bandung')

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-profil.css') }}" />
@endpush

@section('content')
<div class="container text-center mt-5">
    @if($user)
        <img src="{{ $user->profile_photo ?? asset('img/gprofile.jpg') }}" class="rounded-circle mb-3" width="120" height="120">
        <h3>{{ $user->username ?? $user->name }}</h3>
        <p class="text-muted mb-1">{{ $user->email }}</p>
        <p>{{ $user->alamat ?? '-' }}</p>
        <a href="{{ route('profil.edit') }}" class="btn btn-sm btn-outline-primary">Edit Profil</a>
    @else
        <div class="alert alert-danger">Data user tidak ditemukan. Silakan login ulang.</div>
    @endif
</div>

<script>
  feather.replace();
</script>

@endsection