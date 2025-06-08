<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar - FoodVana Bandung</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('style/style-regis.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg custom-navbar px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('img/logo fvb.png') }}" alt="Logo" class="circle-logo-img">
      FoodVana Bandung
    </a>
    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ url('/Foodvana') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/lokasi') }}">Lokasi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak_kami') }}">Kontak Kami</a></li>
      </ul>
    </div>
    <form class="d-flex" role="search">
      <input class="form-control form-control-sm" type="search" placeholder="Search in site">
    </form>
  </nav>

  <!-- Register Form -->
  <div class="register-container">
    <div class="register-form">
      <h2>Daftar Akun</h2>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter Username" value="{{ old('username') }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password" required>

        <label for="role">Role</label>
        <select name="role" id="register-role" required>
          <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
          <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <button type="submit">Daftar</button>
      </form>

      <div class="login">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
      </div>
    </div>
  </div>

</body>
</html>
