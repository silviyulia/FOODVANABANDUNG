@extends('layouts.app2')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container-fluid px-5 py-8">
    <div class="text-start mb-4">
        <a href="{{ url('/Foodvana/home') }}" class="btn btn-warning btn-lg">
            <i class="fas fa-arrow-left me-2"></i>
        </a>
    </div>


    @foreach ($transaksis as $transaksi)
    <div class="row mb-5">
        <div class="col-lg-15">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row g-4">
                        <!-- 🧾 Kolom Kiri: Detail Transaksi -->
                        <div class="col-md-6">
                            <h5 class="card-title mb-3">
                                <i class="fas fa-receipt text-primary me-2"></i>Transaksi #{{ $transaksi->id }}
                            </h5>
                            <ul class="list-unstyled small">
                                <li><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</li>
                                <li><strong>Status:</strong>
                                    <span class="badge bg-success text-capitalize">{{ $transaksi->status }}</span>
                                </li>
                                <li><strong>No HP:</strong> {{ $transaksi->no_hp }}</li>
                                <li><strong>Alamat:</strong> {{ $transaksi->alamat_pengiriman }}</li>
                                <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->translatedFormat('d F Y, H:i') }}</li>
                                <li><strong>Pembayaran:</strong> {{ ucfirst(str_replace('_', ' ', $transaksi->metode_pembayaran)) }}</li>
                            </ul>
                        </div>

                        <!-- 🍽️ Kolom Kanan: Daftar Menu -->
                        <div class="col-sm-6">
                            <h6 class="fw-semibold mb-3">🍽️ Daftar Menu</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered align-middle">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi->detailTransaksi as $item)
                                        <tr>
                                            <td>{{ $item->menu->nama ?? 'Menu tidak ditemukan' }}</td>
                                            <td class="text-center">{{ $item->jumlah }}</td>
                                            <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- row -->
                    <a href="{{ route('pesanan.cetak-struk', $transaksi->id) }}" class="btn btn-outline-primary">
                        <i class="fas fa-download me-1"></i> Unduh Struk
                    </a>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>
    @endforeach

</div>
@endsection