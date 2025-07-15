@extends('layouts.app2')

@section('title', 'Kontak Kami - FoodVana Bandung')


@section('content')
<main class="container my-2">
    <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 640px;">
        <div class="card-body p-4">
            <h4 class="text-center fw-bold mb-3">
                <i class="bi bi-envelope-paper-fill me-2"></i> Kontak Kami
            </h4>
              <p class="text-muted text-center mb-4">
                Kami selalu senang mendengar dari Anda! 
                Apakah Anda memiliki pertanyaan, saran, kritik, atau 
                ingin memberikan masukan mengenai layanan dan menu FoodVana Bandung? 
                Jangan ragu untuk menghubungi kami melalui formulir di bawah ini. 
                Tim kami akan segera merespons pesan Anda.            
              </p>
            <form method="POST" action="{{ route('kontak.store') }}">
                @csrf

                @if(session()->has('user'))
                <input type="hidden" name="nama" value="{{ session('user')['username'] ?? '' }}">
                <input type="hidden" name="email" value="{{ session('user')['email'] ?? '' }}">
                @endif

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
