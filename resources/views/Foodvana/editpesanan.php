@extends('layouts.app2')

@section('content')
<link rel="stylesheet" href="{{ asset('style/editpesanan.css') }}">

<div class="navbar">
    <div class="navbar-left">
        <img src="{{ asset('img/logo fvb.png') }}" alt="Logo FoodVana">
        <strong>FoodVana Bandung</strong>
    </div>
    <nav>
        <a href="{{ route('profil') }}">Profile</a>
        <a href="{{ route('pesanan') }}">Pesanan</a>
        <a href="{{ route('foodvana') }}">Home</a>
        <a href="{{ route('menu') }}">Menu</a>
        <a href="{{ route('kontak') }}">Kontak Kami</a>
        <input type="text" placeholder="Search in site">
    </nav>
</div>

<div class="container">
    <h2>Edit Pesanan</h2>
    <img src="{{ asset('img/seblak.jpg') }}" alt="Makanan">

    <form method="POST" action="{{ route('editpesanan', $pesanan->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $pesanan->nama) }}" placeholder="Masukkan nama...">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $pesanan->alamat) }}" placeholder="Masukkan alamat...">
        </div>

        <div class="form-group">
            <label>Waktu Pengiriman</label><br>
            <div class="btn-group">
                <label><input type="radio" name="waktu" value="ASAP" {{ $pesanan->waktu === 'ASAP' ? 'checked' : '' }}> ASAP</label>
                <label><input type="radio" name="waktu" value="1 jam" {{ $pesanan->waktu === '1 jam' ? 'checked' : '' }}> 1 jam</label>
                <label><input type="radio" name="waktu" value="2 jam" {{ $pesanan->waktu === '2 jam' ? 'checked' : '' }}> 2 jam</label>
            </div>
        </div>

        <div class="form-group">
            <label>Metode Pembayaran</label><br>
            <div class="btn-group">
                <label><input type="radio" name="pembayaran" value="Credit Card" {{ $pesanan->pembayaran === 'Credit Card' ? 'checked' : '' }}> Credit Card</label>
                <label><input type="radio" name="pembayaran" value="Cash" {{ $pesanan->pembayaran === 'Cash' ? 'checked' : '' }}> Cash</label>
            </div>
        </div>

        <button type="submit" class="btn btn-black">Simpan Perubahan</button>
    </form>
</div>
@endsection
