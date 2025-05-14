<?php
session_start();
session_unset(); // Hapus semua variabel session
session_destroy(); // Hancurkan sesi

header("Location: Login.php"); // Arahkan kembali ke halaman login
exit();
?>
