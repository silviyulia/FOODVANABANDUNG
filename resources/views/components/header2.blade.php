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
        <li class="nav-item"><a class="nav-link" href="{{ url('/Foodvana/home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/menu2') }}">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/pesanan') }}">Pesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak2') }}">Kontak Kami</a></li>
      </ul>
    </div>

    <!-- Keranjang Belanja -->
    <ul class="navbar-nav me-3">
      <li class="nav-item position-relative">
        <a class="nav-link" href="{{ url('/cart_items') }}">
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
               xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
               viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
          </svg>
          @if (session('cart_count') > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{ session('cart_count') }}
            </span>
          @endif
        </a>
      </li>
    </ul>

    <!-- Search -->
    <form class="d-flex" role="search" action="{{ url('/menu2') }}" method="GET">
      <input class="form-control form-control-sm" type="search" placeholder="Search in site" />
    </form>

    <!-- Profil -->
    <ul class="navbar-nav ms-3">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/profil') }}">
          <i data-feather="user"></i>
        </a>
      </li>
    </ul>


  </nav>



  <!-- Alert -->
  @if (session('success'))
    <div class="alert alert-success text-center alert-fixed" role="alert">
      {{ session('success') }}
    </div>
  @elseif (session('error'))
    <div class="alert alert-danger text-center alert-fixed" role="alert">
      {{ session('error') }}
    </div>
  @endif

  <script>
    feather.replace();
  </script>
</body>

</html>
