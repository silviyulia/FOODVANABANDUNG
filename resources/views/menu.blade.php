
@extends('layouts.app')

@section('title', 'Menu')

@section('content')

<div class="container">

  <!-- Menu Populer -->
  <section class="menu-populer">
    <h2>Menu Populer</h2>
    <div class="menu-items">
      <div class="card">
        <img src="{{ asset('img/seblak.jpg') }}" alt="Seblak" class="img-fluid mb-2">
        <p><strong>Seblak</strong></p>
        <p>Rating: 4.8</p>
      </div>
      <div class="card">
        <img src="{{ asset('img/batagor.jpg') }}" alt="Batagor" class="img-fluid mb-2">
        <p><strong>Batagor</strong></p>
        <p>Rating: 4.7</p>
      </div>
      <div class="card">
        <img src="{{ asset('img/serabi.jpg') }}" alt="Serabi" class="img-fluid mb-2">
        <p><strong>Serabi</strong></p>
        <p>Rating: 4.6</p>
      </div>
    </div>
  </section>

  <!-- Ulasan Pelanggan -->
  <section class="reviews">
    <h2>Customer Reviews</h2>
    <div class="review-items">
      <div class="card">
        <p><strong>John D.</strong></p>
        <p>Amazing! Everything's fresh.</p>
      </div>
      <div class="card">
        <p><strong>Sarah W.</strong></p>
        <p>Very tasty!</p>
      </div>
      <div class="card">
        <p><strong>Ayu L.</strong></p>
        <p>Good!</p>
      </div>
      <div class="card">
        <p><strong>Budi R.</strong></p>
        <p>Menu lengkap & cepat sampai!</p>
      </div>
    </div>
  </section>

</div>

@endsection

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-menu.css') }}">
@endpush

