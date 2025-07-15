@extends('layouts.appadmin')
@section('title', 'Dashboard - FoodVana Bandung')

@section('content')
<main>
    <div class="container mx-auto px-4 py-6">

        {{-- Heading --}}
        <h2 class="text-xl font-semibold text-gray-800 mb-1">🎉 Selamat Datang di Dashboard Admin!</h2>
        <p class="text-sm text-gray-600 mb-6">Kelola data menu, pengguna, transaksi, dan ulasan dengan mudah di sini.</p>
        

        {{-- Statistik Ringkas --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 mb-6">
        <div class="bg-yellow-100 text-yellow-800 px-3 py-3 rounded-lg shadow text-center">
            <h3 class="text-base font-semibold">Total Menu</h3>
            <p class="text-xl mt-1 font-bold">{{ $menuCount }}</p>
        </div>
        <div class="bg-yellow-100 text-yellow-800 px-3 py-3 rounded-lg shadow text-center">
            <h3 class="text-base font-semibold">Total Pengguna</h3>
            <p class="text-xl mt-1 font-bold">{{ $userCount }}</p>
        </div>
        <div class="bg-yellow-100 text-yellow-800 px-3 py-3 rounded-lg shadow text-center">
            <h3 class="text-base font-semibold">Total Pesanan</h3>
            <p class="text-xl mt-1 font-bold">{{ $transaksiCount }}</p>
        </div>
        <div class="bg-yellow-100 text-yellow-800 px-3 py-3 rounded-lg shadow text-center">
            <h3 class="text-base font-semibold">Total Ulasan</h3>
            <p class="text-xl mt-1 font-bold">{{ $reviewCount }}</p>
        </div>
        <div class="bg-yellow-100 text-yellow-800 px-3 py-3 rounded-lg shadow text-center">
            <h3 class="text-base font-semibold">Pesan Masuk</h3>
            <p class="text-xl mt-1 font-bold">{{ $kontakCount }}</p>
        </div>
    </div>
    
        {{-- Ringkasan Transaksi --}}
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold mb-2">Ringkasan Transaksi</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg shadow">
                    <h4 class="text-sm font-semibold text-blue-800">Total Transaksi Hari Ini</h4>
                    <p class="text-2xl font-bold text-blue-900">{{ $todayOrders }}</p>
                </div>
                <div class="bg-green-50 p-4 rounded-lg shadow">
                    <h4 class="text-sm font-semibold text-green-800">Total Transaksi Bulan Ini</h4>
                    <p class="text-2xl font-bold text-green-900">{{ $monthlyOrders }}</p>
                </div>
                <div class="bg-red-50 p-4 rounded-lg shadow">
                    <h4 class="text-sm font-semibold text-red-800">Total Transaksi Tahun Ini</h4>
                    <p class="text-2xl font-bold text-red-900   ">{{ $yearlyOrders }}</p>
                </div>
            </div>
        </div> 

        <!-- {{-- Navigasi Cepat --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            <a href="{{ route('kuliner.index') }}" class="bg-white shadow rounded-lg p-4 text-center hover:bg-gray-100 transition">
                <i class="fas fa-utensils text-xl mb-2 text-indigo-500"></i>
                <div class="font-semibold text-sm text-gray-800">Kelola Menu</div>
            </a>
            <a href="{{ route('admin.table') }}" class="bg-white shadow rounded-lg p-4 text-center hover:bg-gray-100 transition">
                <i class="fas fa-users text-xl mb-2 text-green-500"></i>
                <div class="font-semibold text-sm text-gray-800">Kelola Pengguna</div>
            </a>
            <a href="{{ route('admin.pesanan') }}" class="bg-white shadow rounded-lg p-4 text-center hover:bg-gray-100 transition">
                <i class="fas fa-shopping-cart text-xl mb-2 text-yellow-500"></i>
                <div class="font-semibold text-sm text-gray-800">Kelola Pesanan</div>
            </a>
            <a href="{{ route('admin.review') }}" class="bg-white shadow rounded-lg p-4 text-center hover:bg-gray-100 transition">
                <i class="fas fa-star text-xl mb-2 text-red-500"></i>
                <div class="font-semibold text-sm text-gray-800">Kelola Ulasan</div>
            </a>
            <a href="{{ route('admin.kontak') }}" class="bg-white shadow rounded-lg p-4 text-center hover:bg-gray-100 transition">
                <i class="fas fa-envelope text-xl mb-2 text-blue-500"></i>
                <div class="font-semibold text-sm text-gray-800">Kelola Pesan Masuk</div>
            </a>
        </div> -->

    </div>
</main>
@endsection