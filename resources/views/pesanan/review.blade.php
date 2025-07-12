@extends('layouts.app2')

@section('title', 'Beri Ulasan')

@section('content')
<div class="container py-3">
    <div class="bg-white p-3 rounded shadow-sm">
        <h2 class="mb-4">📝 Beri Ulasan untuk Pesanan <span class="text-primary">#{{ $transaksi->id }}</span></h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('review.store', $transaksi->id) }}" method="POST">
            @csrf

            @foreach ($transaksi->detailTransaksi as $item)
            <div class="card mb-4 border-2 shadow-sm">
                <div class="card-header bg-light fw-semibold">
                    🍽️ {{ $item->menu->nama ?? 'Menu tidak ditemukan' }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="rating_{{ $item->id }}" class="form-label">Rating (1-5)</label>
                        <select name="ulasan[{{ $item->id }}][rating]" id="rating_{{ $item->id }}" class="form-select" required>
                            <option value="">Pilih rating</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} ⭐</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="komentar_{{ $item->id }}" class="form-label">Komentar</label>
                        <textarea name="ulasan[{{ $item->id }}][komentar]" id="komentar_{{ $item->id }}" class="form-control" rows="3" placeholder="Tulis ulasan..."></textarea>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-end mt-2">
                <a href="{{ route('pesanan.index' , $transaksi->id) }}" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Detail Pesanan
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-1"></i> Kirim Ulasan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
