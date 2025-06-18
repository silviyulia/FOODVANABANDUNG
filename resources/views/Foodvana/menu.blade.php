@extends('layouts.app2')

@section('title', 'Menu')

@section('content')
<div class="container py-2" align ="center">
    <div class="row g-3">
        @foreach ($menus as $menu)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card h-100 shadow-sm">
                    <img class="card-img-top" style="height:180px; object-fit:cover; border-radius:12px 12px 0 0;" src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $menu->nama }}</h5>
                        <p class="card-text text-muted mb-2 text-center">{{ $menu->deskripsi }}</p>
                        <div class="mb-2 text-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="text-warning">{!! $i <= $menu->rating ? '&#9733;' : '&#9734;' !!}</span>
                            @endfor
                            <span class="badge bg-primary ms-2">{{ number_format($menu->rating, 1) }}</span>
                        </div>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-success fs-5">Rp{{ number_format($menu->harga, 0, ',', '.') }}</span>
                            <a href="/cart_items" class="btn btn-sm btn-warning">
                                 <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                             viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                        </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-menu.css') }}">
@endpush
