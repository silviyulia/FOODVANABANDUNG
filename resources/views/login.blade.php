@extends('layouts.app')

@section('title', 'Login - FoodVana Bandung')

@push('head')
    <link rel="stylesheet" href="{{ asset('/style/style-login.css') }}">
@endpush

@section('content')
<div class="login-container" id="Login" style="margin-top: 100px;">
    <div class="login-form">
        <h2>Login</h2>

        {{-- Alert Success/Error --}}
        @if (session('success') || session('message'))
            <div class="alert alert-success text-center alert-fixed" role="alert">
                ✅ {{ session('success') ?? session('message') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger text-center alert-fixed" role="alert">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter Username" required>
            @error('username')
                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            @error('password')
                <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
            @enderror

            <button type="submit">Login</button>
        </form>

        <p class="register">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>
</div>
@endsection
