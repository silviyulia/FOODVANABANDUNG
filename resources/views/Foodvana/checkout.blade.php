@extends ('layouts.app2')

@section('title', 'Checkout - FoodVana Bandung')

@section('content')

  <h2 class="text-center mb-4">Checkout</h2>
    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            {{--!<h4>Ringkasan Pesanan</h4>
            <p>Terima kasih telah berbelanja di FoodVana Bandung! Berikut adalah ringkasan pesanan Anda:</p>
            <p>Silakan periksa detail pesanan Anda sebelum melanjutkan ke pembayaran.</p>---}}
            <div class="container mt-4 bg-light rounded p-4 shadow-sm">
            <h4> Pesanan Anda</h4>
            <ul class="list-group mb-4">
               @foreach($cartItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <img 
                        src="{{ asset('storage/' . $item->menu->gambar) }}" 
                        alt="{{ $item->menu->nama }}" 
                        width="80" 
                        height="80" 
                        style="object-fit: cover; border-radius: 8px;">
                        <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1">{{ $item->menu->nama }}</h5>
                        <p class="mb-1">Jumlah: {{ $item->jumlah }}</p>
                    <span>Rp {{ number_format($item->menu->harga * $item->jumlah, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
            <h5>Total produk:{{ $cartItems->count() }}</h5>

            <hr>
            <h4 class="text-center mb-4">Informasi Pemesanan</h4>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penerima : {{ $user ['username'] ?? $user['name'] }}</label></div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Pengiriman : {{ $user['alamat'] ?? '-' }}</label></div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Telepon : {{ $user['no_hp'] ?? '-' }}</label>  </div>         
            </form>

            <hr>
            <h4 class="text-center mb-4">Metode Pembayaran</h4
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Pilih Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" class="form-select">
                        <
                        <option value="cod">Cash on Delivery</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bank_name" class="form-label">Nama Bank (jika transfer)</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Masukkan nama bank Anda">
                    <label for="bank_account" class="form-label">Nomor Rekening (jika transfer)</label>
                    <input type="text" name="bank_account" id="bank_account" class="form-control" placeholder="Masukkan nomor rekening Anda">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Pembayaran</label>
                    <input type="text" name="amount" id="amount" class="form-control" value="Rp{{ number_format($cartItems->sum(function($item) { return $item->menu->harga * $item->jumlah; }), 0, ',', '.') }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Pembayaran</label>
                    <label name="status" id="status" class="form-control">Menunggu Pembayaran</label>
                </div>
                <div class="mb-3">
                    <label for="transaction_time" class="form-label">Waktu Transaksi</label>
                    <input type="datetime-local" name="transaction_time" id="transaction_time" class ="form-control" value="{{ now()->format('Y-m-d\TH:i') }}" required>
                </div>
               

            </form>
            <div class="text-center">
            <p>Silakan periksa kembali informasi pesanan Anda sebelum melanjutkan.</p>
            <p>Jika ada kesalahan, silakan kembali ke halaman sebelumnya untuk memperbaiki.</p>
            <p>Jika semua informasi sudah benar, silakan klik tombol "Konfirmasi Pembayaran" di bawah ini.</p>
            <p>Terima kasih telah berbelanja di FoodVana Bandung!</p>
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
            </div>  
</div>
</div>

    @if(session('success'))
        <div class="alert alert-success text-center mt-3">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger text-center mt-3">
            {{ session('error') }}
        </div>
    @endif
        

@endsection