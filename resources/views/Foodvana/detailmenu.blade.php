@extends('layouts.app2')

@section('title', 'Detail Menu')

@section('content')

<div class="container my-1">

<div class="text-start mb-2">
        <a href="{{ url('/menu2') }}" class="btn btn-warning btn-lg">
            <i class="fas fa-arrow-left me-1"></i>
        </a>
    </div>
    <div class="card shadow-sm border-0 mb-5">
        <div class="row g-0">
            <!-- Gambar -->
            <div class="col-md-3 text-center p-4">
                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}"
                     class="img-fluid rounded shadow-sm" style="max-height: 320px; object-fit: cover;">
            </div>

            <!-- Info Menu -->
            <div class="col-md-5">
                <div class="card-body">
                    <h3 class="card-title fw-bold">{{ $menu->nama }}</h3>
                    <p class="card-text text-muted mb-3">{{ $menu->deskripsi }}</p>
                    
                    <h5 class="text-success fw-semibold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</h5>

                    <!-- Rating -->
                    <div class="mt-3 mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas {{ $i <= round($menu->rating) ? 'fa-star text-warning' : 'fa-star text-secondary opacity-25' }}"></i>
                        @endfor
                        <span class="badge bg-primary ms-2">{{ number_format($menu->rating, 1) }}/5</span>
                    </div>

                    <!-- Tombol Pesan -->
                    <form action="{{ route('cartitem.store') }}" href="{{ url('/cart_items') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="id_menu" value="{{ $menu->id }}">
                        <input type="hidden" name="jumlah" value="1">
                        <button type="submit" class="btn btn-warning mt-2">
                            <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
                        </button>
                    </form>
                </div>
           </div> 

<!-- Ulasan Pelanggan -->
<div class="col-md-4 bg-light border-start px-4 py-3">
    <div class="card-body">
        <h5 class="mb-3">💬 Ulasan Pelanggan</h5>
        
        @forelse ($menu->reviews as $review)
            <div class="card border-0 shadow-sm mb-4 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->user->name ?? 'Anonim') }}&background=random&size=32" 
                             alt="avatar" class="rounded-circle me-2" width="32" height="32">
                        <div>
                            <strong>{{ $review->user->name ?? 'Anonim' }}</strong><br>
                            <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                        </div>
                        <div class="ms-auto text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas {{ $i <= $review->rating ? 'fa-star' : 'fa-star text-secondary opacity-25' }}"></i>
                            @endfor
                        </div>
                    </div>

                    <p class="text-dark fst-italic" style="font-size: 0.95rem;">
                        “{{ $review->komentar }}”
                    </p>
                </div>
            </div>
        @empty
            <div class="text-muted">Belum ada ulasan untuk menu ini.</div>
        @endforelse
    </div>
</div>
@endsection
