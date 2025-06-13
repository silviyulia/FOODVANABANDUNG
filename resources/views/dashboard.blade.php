@extends('layouts.appadmin')
@section('title', 'Dashboard - FoodVana Bandung')

@section('content')

<main>
    <div class="container mx-auto px-4 py-6">
        {{-- Di sini Anda bisa menempatkan widget atau ringkasan dashboard lainnya --}}
        <h2 class="text-xl font-semibold text-gray-800 dark:text-black">Selamat Datang di Dashboard Admin!</h2>
        <p class="text-gray-600 dark:text-black-400 mt-2">Ini adalah halaman utama dashboard Anda. Untuk melihat daftar menu, klik tautan "Menu" di sidebar.</p>
        
        {{-- Jika Anda ingin menampilkan ringkasan kontak atau user: --}}
        {{-- @include('components.ringkasan_kontak') --}}
        {{-- @include('components.ringkasan_user') --}}
    </div>
</main>

<script>
    feather.replace();
</script>

@endsection