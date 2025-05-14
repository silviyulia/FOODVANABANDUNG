@extends('layouts.app2')

@section('title', 'Profil - FoodVana Bandung')

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-profil.css') }}" />
@endpush

@section('content')
<section class="profile-section">
  <img src="{{ asset('/img/gprofile.jpg') }}" alt="User Profile" />
  <div>
    <strong>User 1</strong><br/>
    <small>Foodie | Traveller</small>
    <div class="mb-3">
    <a href="{{ url('/profil') }}" class="btn btn-outline-primary btn-sm">Edit profile</a>
  </div>
  </div>
</section>

<h2>Recent Posts</h2>
<div class="posts">
  <div class="post-card">
    <img src="{{ asset('/img/nasi.jpg') }}" alt="Nasi Timbel"/>
    <h4>Nasi Timbel</h4>
    <p>Nasi yang dibungkus daun pisang, disajikan dengan lauk seperti ayam goreng, tahu, tempe, sambal, dan lalapan.</p>
  </div>
  <div class="post-card">
    <img src="{{ asset('/img/seblak.jpg') }}" alt="Seblak"/>
    <h4>Seblak Bandung</h4>
    <p>Makanan khas Bandung dari kerupuk basah, dimasak dengan bumbu kencur, bawang, dan cabai.</p>
  </div>
</div>

<div class="review-section">
  <h2>User Reviews</h2>
  <div class="review">
    <strong>Josua</strong><br/>
    ⭐⭐⭐⭐⭐<br/>
    "Seblak nya enak poll! Rekomended!!"
  </div>
  <div class="review">
    <strong>Pita</strong><br/>
    ⭐⭐⭐⭐⭐<br/>
    "Enak bgt!!! rekomended"
  </div>
</div>


@endsection
