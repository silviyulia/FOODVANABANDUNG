<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodvana Bandung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<!--navbar-->
        <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ url('/Foodvana') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak Kami</a></li>
      </ul>

      @if (session('username'))
        <a class="btn btn-danger btn-sm ms-2" href="{{ url('/logout') }}">Logout</a>
      @else
        <a class="btn btn-success btn-sm ms-2" href="{{ url('/login') }}">Login</a>
      @endif
    </div>

    <form class="d-flex" role="search">
      <input class="form-control form-control-sm" type="search" placeholder="Search in site" />
    </form>
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

  <div class="footer-contact">
    <div>
      <strong>Contact Us:</strong><br/>
      FoodVana@example.com<br/>
      <strong>Phone: +62-739-469696 Ext.1017</strong>
    </div>
    <div>
      <strong>Instagram:</strong> FoodVana_Bandung<br/>
      <strong>Facebook:</strong> FoodVana Bandung
    </div>
  </div>

  <script>
    feather.replace();
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) alert.remove();
    }, 4000);
  </script>

</body>
</html>
