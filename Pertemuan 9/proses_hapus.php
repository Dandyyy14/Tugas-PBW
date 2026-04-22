<?php
include 'koneksi_db.php';
 
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
 
    // Cek dulu apakah buku sudah ada di transaksi (Detail_Pesanan)
    $cek = $conn->prepare("SELECT COUNT(*) FROM Detail_Pesanan WHERE Buku_ID = ?");
    $cek->bind_param("i", $id);
    $cek->execute();
    $cek->bind_result($jumlah);
    $cek->fetch();
    $cek->close();
 
    if ($jumlah > 0) {
        echo "<script>alert('Buku tidak dapat dihapus karena sudah ada dalam data transaksi.'); window.location='index.php';</script>";
        exit;
    }
 
    $stmt = $conn->prepare("DELETE FROM Buku WHERE ID = ?");
    $stmt->bind_param("i", $id);
 
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . addslashes($stmt->error) . "'); window.location='index.php';</script>";
    }
 
    $stmt->close();
} else {
    echo "<script>alert('ID tidak valid'); window.location='index.php';</script>";
}
 
$conn->close();
?>