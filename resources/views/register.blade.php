@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('/style/style-regis.css') }}">
@endpush


@section('content')
  <!-- Register Form -->
  <div class="register-container">
    <div class="register-form">
      <h2>Daftar Akun</h2>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <label for="name">Username</label>
        <input type="text" name="username" placeholder="Enter Username" value="{{ old('username') }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit">Daftar</button>
      </form>

      <div class="login">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
      </div>
    </div>
  </div>

@endsection