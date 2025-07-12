@extends('layouts.app2')
@section('content')
<div class="container mt-2">
    <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 540px;">
        <div class="card-body p-3">
            <h5 class="text-center fw-bold mb-3">
                <i class="bi bi-person-lines-fill me-1"></i> Ubah Profil
            </h5>
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" value="{{ $user['username'] }}" class="form-control form-control-sm" required>
                </div>

                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user['email'] }}" class="form-control form-control-sm" required>
                </div>

                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control form-control-sm" rows="2">{{ $user['alamat'] ?? '' }}</textarea>
                </div>

                <div class="mb-2">
                    <label for="profile_photo" class="form-label">Foto Profil</label>
                    <input type="file" name="profile_photo" class="form-control form-control-sm">
                </div>

                <div class="mb-2">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" name="no_hp" value="{{ $user['no_hp'] ?? '' }}" class="form-control form-control-sm">
                </div>

                <div class="d-grid mt-3 gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                    <a href="{{ route('profil.show') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection