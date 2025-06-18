@extends('layouts.app')

@section('title', 'Login - FoodVana Bandung')

@push('head')
    <link rel="stylesheet" href="{{ asset('/style/style-login.css') }}">
@endpush

@section('content')
<div class="login-container" id="Login" style="margin-top: 100px;">
    <div class="login-form">
        <h2>Login</h2>

        @if (session('success') || session('message'))
            <div class="alert alert-success text-center alert-fixed" role="alert">
                ✅ {{ session('success') ?? session('message') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger text-center alert-fixed" role="alert">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <button type="submit">Login</button>
        </form>

        <p class="register">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>
</div>
@endsection
