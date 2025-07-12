@extends('layouts.app2')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container-fluid px-5 py-10">

    <div class="text-start mb-2">
        <a href="{{ url('/Foodvana/home') }}" class="btn btn-warning btn-lg">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if($transaksis->isEmpty())
    <div class="position-relative my-5">

        <!-- 🌫️ Lapisan gelap tipis di atas background -->
        <div class="position-absolute top-0 start-0 w-100 h-100 " style="z-index:1;"></div>

        <!-- 📦 Konten utama dengan padding dan background transparan -->
        <div class="position-relative text-center p-5 mx-auto" style="z-index:2; max-width: 480px; background-color: rgba(255, 255, 255, 0.85); border-radius: 12px;">
            <i class="fas fa-box-open text-secondary mb-3" style="font-size: 60px;"></i>
            <h5 class="text-dark" style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);">Belum ada pesanan yang tercatat</h5>
            <a href="{{ url('/menu2') }}" class="btn btn-success mt-3 shadow-sm">
                <i class="fas fa-utensils me-2"></i> Mulai Pesan Sekarang
            </a>
        </div>

    </div>
@else
        @foreach ($transaksis as $transaksi)
        <div class="row mb-4">
            <div class="col-lg-15">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row g-0">

                            <!-- 🧾 Kolom Kiri: Detail Transaksi -->
                            <div class="col-md-6">
                                <h5 class="card-title mb-3">
                                    <i class="fas fa-receipt text-primary me-2"></i> Transaksi #{{ $transaksi->id }}
                                </h5>

                                @php
                                    $badgeColor = match(strtolower($transaksi->status)) {
                                        'pending' => 'warning',
                                        'diproses' => 'info',
                                        'selesai' => 'success',
                                        default => 'secondary',
                                    };
                                @endphp

                                <ul class="list-unstyled mb-0">
                                    <li><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</li>
                                    <li><strong>Status:</strong> <span class="badge bg-{{ $badgeColor }} text-capitalize">{{ $transaksi->status }}</span></li>
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

                                @if (strtolower($transaksi->status) === 'selesai')
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('pesanan.review', $transaksi->id) }}" class="btn btn-success">
                                        <i class="fas fa-comment-dots me-1"></i> Beri Ulasan
                                    </a>
                                </div>
                                @endif

                            </div> <!-- end col-sm-6 -->
                        </div> <!-- end row -->

                        <div class="text-end mt-4">
                            <a href="{{ route('pesanan.cetak-struk', $transaksi->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-download me-1"></i> Unduh Struk
                            </a>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
        @endforeach
    @endif

</div>

@endsection