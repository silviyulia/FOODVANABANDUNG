{{-- resources/views/index.blade.php --}}
@extends('layouts.app2')

@section('title', 'Beranda')

@section('content')
<div class=align-items-center text-center">
<section class="welcome-section container">
    <div class="row align-items-center">
      <div class="col-md-6 welcome-text">
      <h1>Welcome to FoodVana Bandung,</h1>
        <p class="lead">Nikmati kuliner terbaik di kota Bandung</p>
        <a href="/menu2" class="btn btn-success mt-3">Lihat Menu</a>
      </div>
      <div class="col-md-5 text-center">
        <img src="{{ asset('img/picture.jpg') }}" alt="Image" class="image"/>
      </div>
  </section>

  <section class="menu-section container">
    <div class="row align-items-center"> 
    <h1 class="text-center mb-4">Menu Kami</h1>
  </div>
    <div class="row g-3">
        @foreach ($menus as $menu)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100  shadow-sm">
                    <img class="card-img-left" style="height:180px; object-fit:cover; border-radius:12px 12px 0 0;" src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}">
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
                                <form action="{{ route('cartitem.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="id_menu" value="{{ $menu->id }}">
                                    <input type="hidden" name="jumlah" value="1">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                     </div>
                </div>
            </div>
        @endforeach
    </div>

  </section>
  </div>
@endsection
