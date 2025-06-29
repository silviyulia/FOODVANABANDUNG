@extends('layouts.app2')

@section('title', 'Riwayat Pesanan')

@section('content')
<!-- <div class="container mt-4">
    <h3 class="mb-4">Riwayat Pesanan Anda</h3>

    @forelse($transaksis as $transaksi)
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-light">
                <strong>Transaksi #{{ $transaksi->id }}</strong> — {{ $transaksi->tanggal_transaksi->format('d M Y H:i') }}
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> {{ $transaksi->status }}</p>
                <p><strong>Total:</strong> Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                <p><strong>Alamat:</strong> {{ $transaksi->alamat_pengiriman }}</p>

                <ul class="list-group mt-3">
                    @foreach($transaksi->detailTransaksi as $detail)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $detail->menu->nama }} (x{{ $detail->jumlah }})</span>
                            <span>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Belum ada riwayat pesanan.</div>
    @endforelse
</div>
@endsection -->