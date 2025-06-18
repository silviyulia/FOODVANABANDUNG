@extends('layouts.app2')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Keranjang Belanja</h2>
    @foreach($cartItems as $item)
        <div class="card mb-3 p-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h5>{{ $item->menu->nama }}</h5>
                    <p>Jumlah: {{ $item->jumlah }}</p>
                    <p>Harga: Rp{{ number_format($item->menu->harga, 0, ',', '.') }}</p>
                </div>
                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach

    @if($cartItems->count() > 0)
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button class="btn btn-success mt-3">Checkout</button>
        </form>
    @else
        <p>Keranjang kosong.</p>
    @endif
</div>
@endsection
