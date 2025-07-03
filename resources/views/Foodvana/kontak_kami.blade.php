@extends('layouts.app2')

@section('title', 'Kontak Kami - FoodVana Bandung')

@push('head')
  <!-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> -->

  <link rel="stylesheet" href="{{ asset('/style/style-kontak.css') }}">

@endpush

@section('content')
<main class="contact-section container">
  <h2>Tentang Kami</h2>
      <p>Kami selalu senang mendengar dari Anda! Apakah Anda memiliki pertanyaan, saran, kritik, atau ingin memberikan masukan mengenai layanan dan menu FoodVana Bandung? Jangan ragu untuk menghubungi kami melalui formulir di bawah ini. Tim kami akan segera merespons pesan Anda.</p>

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

  
<!-- <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="/docs/images/blog/image-4.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </div>
</a> -->

</main>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endsection
