<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'FoodVana Bandung')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Feather Icons -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

  <link rel=”stylesheet” href=”https://cdn.tailwindcss.com/3.4.1”>

  <!-- Custom per halaman -->
  @stack('head')
</head>
<body>

  @include('components.header2')

  <main class="py-4">
    @yield('content')
  </main>

  @include('components.footer')

  <!-- Feather Icons -->
  <script>feather.replace();</script>
  
</body>
</html>
