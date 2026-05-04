<?php
session_start();
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username             = trim($_POST['username']);
    $password             = $_POST['password'];
    $konfirmasi_password  = $_POST['konfirmasi_password'];

    // Validasi: username tidak boleh kosong
    if (empty($username)) {
        header("Location: daftar.php?message=" . urlencode("Nama pengguna tidak boleh kosong."));
        exit;
    }

    // Validasi: password minimal 3 karakter
    if (strlen($password) < 3) {
        header("Location: daftar.php?message=" . urlencode("Kata sandi minimal 6 karakter."));
        exit;
    }

    // Validasi: konfirmasi password harus sama
    if ($password !== $konfirmasi_password) {
        header("Location: daftar.php?message=" . urlencode("Konfirmasi kata sandi tidak cocok."));
        exit;
    }

    // Cek apakah username sudah dipakai
    $cek = $conn->prepare("SELECT id FROM pengguna WHERE nama = ?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cek->store_result();

    if ($cek->num_rows > 0) {
        header("Location: daftar.php?message=" . urlencode("Nama pengguna sudah digunakan, pilih yang lain."));
        exit;
    }
    $cek->close();

    // Simpan akun baru
    $stmt = $conn->prepare("INSERT INTO pengguna (nama, katasandi) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("Location: login.php?message=" . urlencode("Akun berhasil dibuat! Silakan login."));
        exit;
    } else {
        header("Location: daftar.php?message=" . urlencode("Gagal membuat akun: " . addslashes($stmt->error)));
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>