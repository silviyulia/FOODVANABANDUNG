@extends('layouts.appadmin')
@section('title', 'Dashboard - FoodVana Bandung')

@section('content')

<main>
    <div class="container mx-auto px-4 py-6">
        {{-- Di sini Anda bisa menempatkan widget atau ringkasan dashboard lainnya --}}
        <h2 class="text-xl font-semibold text-gray-800 dark:text-black">Selamat Datang di Dashboard Admin!</h2>
        <p class="text-secondary mb-4">Kelola data menu, pengguna, dan kontak dengan mudah di sini.</p>
        
        <div class="flex flex-wrap -mx-4">
         <!-- Ringkasan Card -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i data-feather="users"></i>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-primary">
                            <h6 class="card-title mb-0">Total Users</h6>
                            <h4>{{ $userCount ?? '0' }}</h4></button>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning text-white rounded-circle p-3 me-3">
                            <i data-feather="book-open"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-0">Total Menu</h6>
                            <h4>{{ $menuCount ?? '0' }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-danger text-white rounded-circle p-3 me-3">
                            <i data-feather="mail"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-0">Pesan Masuk</h6>
                            <h4>{{ $kontakCount ?? '0' }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
    </div>
</main>

<script>
    feather.replace();
</script>

@endsection