@extends('layouts.appadmin')

@section('title', 'Daftar Pesanan - admin')

@section('content')
<div class="container mx-auto p-4 mt-20">
    @include('components.table_pesanan', ['transaksis' => $transaksis])
</div>



@endsection