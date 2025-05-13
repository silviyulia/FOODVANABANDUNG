<?php
session_start();
$pesanan = [
    [
        "nama" => "Nasi Timbel",
        "harga" => 25000,
        "quantity" => 1,
        "gambar" => "img/nasi.jpg"
    ],
    [
        "nama" => "Batagor",
        "harga" => 10000,
        "quantity" => 2,
        "gambar" => "img/batagor.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Anda - FoodVana Bandung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="style6.css" rel="stylesheet"/>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top px-4" style="background-color: rgba(227, 153, 51, 1); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
  <a class="navbar-brand d-flex align-items-center text-white" href="#">
    <img src="img/logo fvb.png" alt="Logo" width="30" height="30" class="rounded-circle me-2">
    <span class="fw-bold text-white">FoodVana Bandung</span>
  </a>
  <div class="collapse navbar-collapse justify-content-center">
    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
      <li class="nav-item"><a class="nav-link text-white" href="profil.html">Profil</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="pesanan.php">Pesanan</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="menu.php">Menu</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="kontak_kami.php">Kontak Kami</a></li>
    </ul>
    <?php if (isset($_SESSION['username'])): ?>
        <a class="btn btn-danger btn-sm ms-2" href="logout.php">Logout</a>
    <?php else: ?>
        <a class="btn btn-success btn-sm ms-2" href="Login.php">Login</a>
    <?php endif; ?>
  </div>
  <form class="d-flex" role="search">
    <input class="form-control form-control-sm" type="search" placeholder="Search in site" />
  </form>
</nav>

<!-- Konten -->
<div class="container">
    <h1>Pesanan Anda</h1>

    <div class="buttons">
        <a href="batal.php" class="cancel">Batalkan Pemesanan</a>
        <a href="editpesanan.html" class="edit">Edit Pemesanan</a>
    </div>

    <?php
    $total = 0;
    foreach ($pesanan as $item):
        $subtotal = $item['harga'] * $item['quantity'];
        $total += $subtotal;
    ?>
        <div class="order-item">
            <img src="<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['nama']); ?>">
            <div class="order-details">
                <div><?php echo htmlspecialchars($item['nama']); ?></div>
                <small>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></small>
            </div>
            <div class="order-price">
                Rp.<?php echo number_format($subtotal, 0, ',', '.'); ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="total">
        Total: Rp.<?php echo number_format($total, 0, ',', '.'); ?>
    </div>
</div>

</body>
</html>
