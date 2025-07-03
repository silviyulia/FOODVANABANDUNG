{{-- resources/views/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  <section class="welcome-section container">
    <div class="row align-items-center">
      <div class="col-md-6 welcome-text ">
        <h1>Welcome to FoodVana Bandung</h1>
      </div>
      <div class="col-md-5 text-center">
        <img src="{{ asset('img/picture.jpg') }}" alt="Image" class="image"/>
      </div>
    </div>


@endsection
