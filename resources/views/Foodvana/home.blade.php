{{-- resources/views/index.blade.php --}}
@extends('layouts.app2')

@section('title', 'Beranda')

@section('content')
<div class=align-items-center text-center">
<section class="welcome-section container">
    <div class="row align-items-center">
      <div class="col-md-6 welcome-text">
        <h1>Welcome to FoodVana Bandung,  </h1> {{-- Auth::user()->name --}}
        <p class="lead">Nikmati kuliner terbaik di kota Bandung</p>
        <a href="/menu2" class="btn btn-success mt-3">Lihat Menu</a>
      </div>
      <div class="col-md-5 text-center">
        <img src="{{ asset('img/picture.jpg') }}" alt="Image" class="image"/>
      </div>
    </div>
  </section>
@endsection
