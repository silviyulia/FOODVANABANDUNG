@extends('layouts.appadmin')

@section('title', 'Daftar Pesanan - admin')

@section('content')


<div>
    <div class="container mt-5">
        <h2 class="mb-4">📦 Daftar Pesanan Masuk</h2>
    @include('components.table_pesanan', ['transaksis' => $transaksis])
</div>



@endsection