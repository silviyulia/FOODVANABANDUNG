@extends('layouts.app2')

@section('title', 'success checkout')

@section('content')

<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-body text-center d-flex flex-column align-items-center">
            <h5 class="card-title">success checkout</h5>
            <p class="card-text">Terima kasih telah melakukan checkout</p>
            <a href="{{ url('/pesanan/detail'), $transaksis->id) }}" class="btn btn-primary mt-3">lihat detail transaksi</a>
            <a href="{{ url('/Foodvana/home') }}" class="btn btn-primary mt-2">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection