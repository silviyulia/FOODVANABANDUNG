@extends('layouts.app')

@section('title', 'Kontak Kami - FoodVana Bandung')

@push('head')
  <link rel="stylesheet" href="{{ asset('/style/style-kontak.css') }}">
@endpush

@section('content')
<main class="container my-2">
    <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 640px;">
        <div class="card-body p-4">
            <h4 class="text-center fw-bold mb-3">
                <i class="bi bi-envelope-paper-fill me-2"></i> Kontak Kami
            </h4>
            <p class="text-muted text-center mb-4">
               Kami selalu senang mendengar dari Anda! Apakah Anda memiliki pertanyaan, saran, kritik, atau ingin memberikan masukan mengenai layanan dan menu FoodVana Bandung? Jangan ragu untuk menghubungi kami melalui formulir di bawah ini. Tim kami akan segera merespons pesan Anda.
            </p>

            <form method="POST" action="{{ route('kontak.store') }}">
                @csrf

                @php
                $user = session('user');
                $username = is_array($user) ? ($user['username'] ?? '') : '';
                $email = is_array($user) ? ($user['email'] ?? '') : '';
                @endphp

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama Anda" value="{{ $username }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan alamat email" value="{{ $email }}" required>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan Anda</label>
                    <textarea class="form-control" name="pesan" id="pesan" rows="4" placeholder="Tulis pesan Anda di sini" required></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-send-fill me-1"></i> Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>


@endsection
