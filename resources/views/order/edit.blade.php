@extends('layouts.app2')

@section('title', 'Edit Pesanan - FoodVana Bandung')

@push('styles')
<link rel="stylesheet" href="{{ asset('style/edit-order.css') }}">
@endpush

@section('content')
<div class="edit-container">
    <h4>Edit Pesanan</h4>

    <img src="{{ asset('img/' . ($order->image ?? 'default.jpg')) }}" alt="Seblak" class="order-image">

    <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama..." value="{{ old('nama', $order->nama) }}">
            @error('nama')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat..." value="{{ old('alamat', $order->alamat) }}">
            @error('alamat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Waktu Pengiriman</label><br>
            <div class="btn-group-radio">
                <label><input type="radio" name="waktu" value="ASAP" {{ old('waktu', $order->waktu) == 'ASAP' ? 'checked' : '' }}> ASAP</label>
                <label><input type="radio" name="waktu" value="1 jam" {{ old('waktu', $order->waktu) == '1 jam' ? 'checked' : '' }}> 1 jam</label>
                <label><input type="radio" name="waktu" value="2 jam" {{ old('waktu', $order->waktu) == '2 jam' ? 'checked' : '' }}> 2 jam</label>
            </div>
            @error('waktu')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Metode Pembayaran</label><br>
            <div class="btn-group-radio">
                <label><input type="radio" name="pembayaran" value="Credit Card" {{ old('pembayaran', $order->pembayaran) == 'Credit Card' ? 'checked' : '' }}> Credit Card</label>
                <label><input type="radio" name="pembayaran" value="Cash" {{ old('pembayaran', $order->pembayaran) == 'Cash' ? 'checked' : '' }}> Cash</label>
            </div>
            @error('pembayaran')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
</div>
@endsection
