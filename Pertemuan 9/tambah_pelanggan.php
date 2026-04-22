<?php
include "koneksi_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Pelanggan</title>
</head>
<body>
 
<?php include 'nav.php'; ?>
 
<div style="width: 90%; margin: auto;" class="mt-4">
    <h4>Tambahkan Pelanggan Baru</h4>
 
    <form action="proses_tambah_pelanggan.php" method="post" style="width: 50%;">
 
        <div class="mb-3">
            <label for="Nama" class="form-label">Masukkan Nama :</label>
            <input class="form-control" type="text" name="Nama" id="Nama" placeholder="Masukkan Nama" required>
        </div>
 
        <div class="mb-3">
            <label for="Alamat" class="form-label">Masukkan Alamat :</label>
            <textarea class="form-control" name="Alamat" id="Alamat" placeholder="Masukkan Alamat" style="height: 100px"></textarea>
        </div>
 
        <div class="mb-3">
            <label for="Email" class="form-label">Masukkan Email :</label>
            <input class="form-control" type="email" name="Email" id="Email" placeholder="contoh@gmail.com">
        </div>
 
        <div class="mb-3">
            <label for="Telepon" class="form-label">Masukkan Nomor Telepon :</label>
            <input class="form-control" type="text" name="Telepon" id="Telepon" placeholder="08xxxxxxxxxx">
        </div>
 
        <button class="btn btn-warning" type="submit">Simpan</button>
 
    </form>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>