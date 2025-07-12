@extends('layouts.appadmin')
@section('title', 'Dashboard - FoodVana Bandung')

@section('content')

<main>
    <div class="container mx-auto px-4 py-6">
        {{-- Di sini Anda bisa menempatkan widget atau ringkasan dashboard lainnya --}}
        <h2 class="text-xl font-semibold text-gray-800 dark:text-black">Selamat Datang di Dashboard Admin!</h2>
        <p class="text-secondary mb-4">Kelola data menu, pengguna, dan kontak dengan mudah di sini.</p>
        
        
        
    </div>
</main>

<script>
    feather.replace();
</script>

@endsection