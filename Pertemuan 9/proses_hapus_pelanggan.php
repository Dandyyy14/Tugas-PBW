<?php
include 'koneksi_db.php';
 
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
 
    // Cek apakah pelanggan punya riwayat pesanan
    $cek = $conn->prepare("SELECT COUNT(*) FROM pesanan WHERE Pelanggan_ID = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $cek->bind_result($jumlah);
    $cek->fetch();
    $cek->close();
 
    if ($jumlah > 0) {
        echo "<script>alert('Pelanggan tidak dapat dihapus karena masih memiliki riwayat pesanan.'); window.location.href='lihat_pelanggan.php';</script>";
        exit;
    }
 
    $stmt = $conn->prepare("DELETE FROM pelanggan WHERE ID = ?");
    $stmt->bind_param("i", $id);
 
    if ($stmt->execute()) {
        echo "<script>alert('Pelanggan berhasil dihapus.'); window.location.href='lihat_pelanggan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus: " . addslashes($stmt->error) . "'); window.location.href='lihat_pelanggan.php';</script>";
    }
 
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('ID tidak valid.'); window.location.href='lihat_pelanggan.php';</script>";
}
?>