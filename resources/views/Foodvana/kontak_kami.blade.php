@extends('layouts.app2')

@section('title', 'Kontak Kami - FoodVana Bandung')

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-kontak.css') }}">
@endpush

@section('content')
<main class="contact-section container">
  <h2>Tentang Kami</h2>
  <div class="contact-container">

    <form class="contact-form" method="POST" action="{{ route('kontak.store') }}">
      @csrf
      <p>Kami selalu senang mendengar dari Anda! Apakah Anda memiliki pertanyaan, saran, kritik, atau ingin memberikan masukan mengenai layanan dan menu FoodVana Bandung? Jangan ragu untuk menghubungi kami melalui formulir di bawah ini. Tim kami akan segera merespons pesan Anda.</p>
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
