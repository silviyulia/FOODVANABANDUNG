<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FoodVana Bandung</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

  <link rel="stylesheet" href="{{ asset('style/style.css') }}">

  <style>
    .alert-fixed {
      position: fixed;
      top: 80px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 9999;
      width: 90%;
      max-width: 500px;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="{{ asset('img/logo fvb.png') }}" alt="Logo" width="30" height="30" class="rounded-circle me-2">
      FoodVana Bandung
    </a>

    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ url('/Foodvana.home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/menu2') }}">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/pesanan') }}">pesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak2') }}">Kontak Kami</a></li>
      </ul>

      @if (session('username'))
        <a class="btn btn-danger btn-sm ms-2" href="{{ url('/logout') }}">Logout</a>
      @endif
    </div>

    <form class="d-flex" role="search">
      <input class="form-control form-control-sm" type="search" placeholder="Search in site" />
    </form>
 
     <li class="nav-item">
  <a class="nav-link" href="{{ url('/profil') }}">
    <i data-feather="user"></i>
  </a>
</li>


  </nav>

  @if (session('success'))
    <div class="alert alert-success text-center alert-fixed" role="alert">
      {{ session('success') }}
    </div>
  @elseif (session('error'))
    <div class="alert alert-danger text-center alert-fixed" role="alert">
      {{ session('error') }}
    </div>
  @endif
