<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Silakan login terlebih dahulu untuk mengakses halaman ini.";
    header("Location: /login");
    exit();
}
?>
