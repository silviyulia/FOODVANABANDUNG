@extends('layouts.app2')

@section('title', 'Checkout - FoodVana Bandung')

@section('content')
<div class="container mt-4">
    <div class="col-md-10 offset-md-1">

        {{-- ==== KERANJANG ==== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Pesanan Anda</h4>
                <a href="{{ url('/cart_items') }}" class="btn btn-warning btn-sm" id="cart_items">edit</a>

            </div>
            <div class="card-body bg-light">
                <ul class="list-group">
                    @foreach($cartItems as $item)
                        <li class="list-group-item d-flex align-items-center">
                            <img src="{{ asset('storage/' . $item->menu->gambar) }}" width="70" height="70" class="rounded" style="object-fit: cover;">
                            <div class="ms-3 w-100">
                                <h6 class="mb-1">{{ $item->menu->nama }}</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Jumlah: {{ $item->jumlah }}</span>
                                    <strong>Rp {{ number_format($item->menu->harga * $item->jumlah, 0, ',', '.') }}</strong>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3">
                    <h5>Total Produk: {{ $cartItems->sum('jumlah') }} item dari {{ $cartItems->count() }} menu</h5>

                </div>
            </div>
        </div>

        {{-- ==== INFORMASI PEMESANAN ==== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-user me-2"></i>Informasi Pemesanan</h5>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            </div>
            <div class="card-body">
                @php $checkoutUser = session('checkout_user'); @endphp
                <p><strong>Nama Penerima:</strong> {{ $checkoutUser['username'] ?? $user['username'] ?? $user['name'] ?? '-' }}</p>
                <p><strong>Alamat Pengiriman:</strong> {{ $checkoutUser['alamat'] ?? $user['alamat'] ?? '-' }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $checkoutUser['no_hp'] ?? $user['no_hp'] ?? '-' }}</p>
            </div>
        </div>

        {{-- ==== MODAL EDIT INFORMASI ==== --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('checkout.update') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="editModalLabel">Edit Informasi Pemesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama Penerima</label>
                                <input type="text" name="username" class="form-control"
                                    value="{{ old('username', $checkoutUser['username'] ?? $user['username'] ?? $user['name'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label>Alamat Pengiriman</label>
                                <input type="text" name="alamat" class="form-control"
                                    value="{{ old('alamat', $checkoutUser['alamat'] ?? $user['alamat'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control"
                                    value="{{ old('no_hp', $checkoutUser['no_hp'] ?? $user['no_hp'] ?? '') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- ==== METODE PEMBAYARAN ==== --}}
        @php
            $totalPembayaran = $cartItems->sum(fn($item) => $item->menu->harga * $item->jumlah);
        @endphp

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="fas fa-money-check me-2"></i>Metode Pembayaran</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Pilih Metode Pembayaran</label>
                        <select name="payment_method" id="payment_method" class="form-select">
                            <option value="transfer_bca">BCA</option>
                            <option value="transfer_bri">BRI</option>
                            <option value="transfer_bni">BNI</option>
                            <option value="transfer_mandiri">Mandiri</option>
                            <option value="ovo">OVO</option>
                            <option value="gopay">Gopay</option>
                            <option value="dana">DANA</option>
                            <option value="cash">Cash on Delivery</option>
                        </select>
                    </div>

                    <div class="mb-3">

                        @php
                            $totalPembayaran = $cartItems->sum(fn($item) => $item->menu->harga * $item->jumlah);
                        @endphp

                        <label class="form-label">Jumlah Pembayaran</label>
                        <input type="hidden" name="total" value="{{ $totalPembayaran }}">
                        <input type="text" class="form-control" value="Rp{{ number_format($cartItems->sum(function($item) { return $item->menu->harga * $item->jumlah; }), 0, ',', '.') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Pembayaran</label>
                        <input type="text" class="form-control" value="Menunggu Pembayaran" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="transaction_time" class="form-label">Waktu Transaksi</label>
                        <input type="datetime-local" name="transaction_time" id="transaction_time" class="form-control"
                            value="{{ now()->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>
            </div>

            <div class="text-center mb-4">
                <p>Pastikan semua data sudah benar sebelum melanjutkan.</p>
                <button type="submit" id="pay-button" class="btn btn-success btn-lg px-5">
                    <i class="fas fa-check-circle me-2"></i>Konfirmasi Pembayaran
                </button>
            </div>
        </form>

        {{-- ==== NOTIFIKASI ==== --}}
        @if(session('success'))
            <div class="alert alert-success text-center mt-3">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center mt-3">
                {{ session('error') }}
            </div>
        @endif

    </div>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
