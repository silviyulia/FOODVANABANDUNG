@extends('layouts.app2')

@section('content')
<div class="container text-center mt-5">
    <h2 class="text-success"><i class="fas fa-check-circle"></i> Pembayaran Berhasil!</h2>
    <p>Terima kasih telah memesan di FoodVana Bandung.</p>
        <a href="{{ url('/pesanan/detail'), $transaksis->id) }}" class="btn btn-primary mt-3">lihat detail transaksi</a>
        <a href="{{ url('/Foodvana/home') }}" class="btn btn-primary mt-2">Kembali ke Beranda</a>
        </div>
@endsection
