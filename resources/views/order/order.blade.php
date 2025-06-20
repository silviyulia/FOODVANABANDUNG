@extends('layouts.app2')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Pesanan Saya</h2>
    @if($orders->isEmpty())
        <div class="alert alert-info">Anda belum memiliki pesanan.</div>
    @else
        @foreach($orders as $order)
            <div class="card mb-3 p-3" style="background-color:rgb(255, 255, 255); border-radius: 6px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Pesanan #{{ $order->id }}</h5>
                        <p class="text-muted mb-0">
                            {{ $order->created_at->format('d M Y H:i') }} - 
                            Status: <span class="text-{{ $order->status == 'completed' ? 'success' : 'warning' }}">{{ ucfirst($order->status) }}</span>
                        </p>
                        <p class="mb-0">Total: Rp{{ number_format($order->total, 0, ',', '.') }}</p>
                        <p class="mb-0">Alamat: {{ $order->alamat }}</p>

                        <p class="mb-0">Metode Pembayaran: {{ $order->metode_pembayaran }}</p>
                        <p class="mb-0">Catatan: {{ $order->catatan ?? '-' }}</p>   
                    </div>
                    <div class="text-end">
                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        @if($order->status == 'pending')
                            <form action="{{ route('order.cancel', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Batalkan Pesanan</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="mt-3">
                    <h6>Detail Pesanan:</h6>
                    <ul class="list-group">
                        @foreach($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->menu->nama }}</strong> ({{ $item->jumlah }} x Rp{{ number_format($item->menu->harga, 0, ',', '.') }})
                                </div>
                                <span class="text-success">Rp{{ number_format($item->jumlah * $item->menu->harga, 0, ',', '.') }}</span>
                            </li>
                        @endforeach