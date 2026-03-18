<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan</title>
</head>
<body style="display: flex; justify-content: center; align-items: center;">

    <div>
        <h2>Perhitungan Total Pembelian Dengan Array</h2>
        <hr>

        <?php
            $infobarang = [
                "nama" => "Laptop",
                "harga" => 8000000
            ];

            $persenpajak = 10;
            $jumlahbeli = 1;

            $total = $infobarang["harga"] * $jumlahbeli;
            $pajak = $total * ($persenpajak / 100);
            $totalakhir = $total + $pajak;
        ?>

        <p>Nama Barang : <?php echo $infobarang["nama"]; ?></p>
        <p>Harga Satuan : Rp <?php echo number_format($infobarang["harga"]); ?></p>
        <p>Jumlah Beli : <?php echo $jumlahbeli; ?></p>
        <p>Total (Tanpa Pajak) : Rp <?php echo number_format($total); ?></p>
        <p>Pajak : Rp <?php echo number_format($pajak); ?></p>
        <p>Total Akhir : Rp <?php echo number_format($totalakhir); ?></p>

    </div>

</body>
</html>
