@extends('layouts.app')

@section('title', 'Kontak Kami - FoodVana Bandung')

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-kontak.css') }}">
@endpush

@section('content')
<main class="contact-section container">
  <h2>Kontak Kami</h2>
  <div class="contact-container">

    <form class="contact-form" method="POST" action="{{ route('kontak.store') }}">
      @csrf
      <label>Nama :</label>
      <input type="text" name="nama" placeholder="Masukkan nama..." required>

      <label>Email :</label>
      <input type="email" name="email" placeholder="Masukkan email..." required>

      <label>Kirim pesan :</label>
      <textarea name="pesan" placeholder="Ketikkan pesan..." required></textarea>

      <button type="submit">Kirim</button>
    </form>

  </div>
</main>


@endsection
