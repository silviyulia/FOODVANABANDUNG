@extends('layouts.app2')
@section('content')
<div class="container mt-3">
    <div class="container p-3 bg-light ">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        
        <div class="mb-1">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" value="{{ $user['username'] }}" class="form-control" required>
        </div>

        <div class="mb-1">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $user['email'] }}" class="form-control" required>
        </div>

        <div class="mb-1">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ $user['alamat'] ?? '' }}</textarea>
        </div>

        <div class="mb-1">
            <label for="profile_photo" class="form-label">Foto Profil</label>
            <input type="file" name="profile_photo" class="form-control">
        </div>

        <div class="mb-1">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" name="no_hp" value="{{ $user['no_hp'] ?? '' }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
</div>

@endsection