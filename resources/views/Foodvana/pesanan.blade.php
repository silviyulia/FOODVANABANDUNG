@extends('layouts.app2')

@section('title', 'Pesanan Anda - FoodVana Bandung')

@push('head')
  <link href="{{ asset('/style/style-pesanan.css') }}" rel="stylesheet"/>
@endpush

@section('content')
<div class="container mt-5 pt-5">
  <h1 class="mb-4">Pesanan Anda</h1>

  <div class="mb-3">
    <a href="{{ url('/batal') }}" class="btn btn-outline-danger btn-sm">Batalkan Pemesanan</a>
    <a href="{{ url('/order/1/edit') }}" class="btn btn-outline-primary btn-sm">Edit Pemesanan</a>
  </div>

  @php $total = 0; @endphp

  @foreach ($pesanan as $item)
    @php
      $subtotal = $item['harga'] * $item['quantity'];
      $total += $subtotal;
    @endphp
    <div class="d-flex align-items-center mb-3 border p-2 rounded shadow-sm">
      <img src="{{ asset($item['gambar']) }}" alt="{{ $item['nama'] }}" width="80" class="rounded me-3">
      <div class="flex-grow-1">
        <strong>{{ $item['nama'] }}</strong><br>
        <small>Quantity: {{ $item['quantity'] }}</small>
      </div>
      <div class="fw-bold text-end text-success">
        Rp{{ number_format($subtotal, 0, ',', '.') }}
      </div>
    </div>
  @endforeach

  <div class="text-end mt-4 fw-bold fs-5">
    Total: Rp{{ number_format($total, 0, ',', '.') }}
  </div>
</div>
@endsection
