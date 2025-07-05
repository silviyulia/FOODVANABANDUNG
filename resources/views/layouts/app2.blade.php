<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'FoodVana Bandung')</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- CSS -->
  <link rel=”stylesheet” href=”https://cdn.tailwindcss.com/3.4.1”>
  <link rel ="stylesheet" href="/public/style/flowbite.min.css">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" /> -->

  <!-- Custom per halaman -->
  @stack('head')
</head>
<body>

  
  @include('components.header2')

  <main class="py-4">
    @yield('content')

  </main>


  <!-- Feather Icons -->
  <script>feather.replace();</script> 
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
