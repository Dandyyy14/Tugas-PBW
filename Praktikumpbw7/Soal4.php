<h3>Soal 4 - Genap / Ganjil</h3>

<form method="POST">
    Masukkan angka:
    <input type="number" name="angka" required>
    <button type="submit">Cek</button>
</form>

<br>

<?php
if (isset($_POST['angka'])) {
    $angka = $_POST['angka'];

    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

    echo "Angka $angka adalah $hasil";
}
?>