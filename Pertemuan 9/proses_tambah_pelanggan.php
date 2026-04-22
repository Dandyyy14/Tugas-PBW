<?php
include 'koneksi_db.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = $_POST['Nama'];
    $alamat  = $_POST['Alamat'];
    $email   = $_POST['Email'];
    $telepon = $_POST['Telepon'];
 
    $stmt = $conn->prepare("INSERT INTO pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $alamat, $email, $telepon);
 
    if ($stmt->execute()) {
        echo "<script>alert('Pelanggan berhasil ditambahkan!'); window.location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan pelanggan: " . addslashes($stmt->error) . "'); window.history.back();</script>";
    }
 
    $stmt->close();
    $conn->close();
}
?>