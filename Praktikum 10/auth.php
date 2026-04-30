<?php
// Cukup include file ini di bagian paling atas setiap halaman
// untuk memproteksi halaman dari akses tanpa login
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
?>
