<!DOCTYPE html>
<html>
<head>
    <title>Menu Program</title>
</head>
<body>

<h2>Menu Navigasi</h2>
<a href="?page=soal1">Soal 1</a> |
<a href="?page=soal2">Soal 2</a> |
<a href="?page=soal3">Soal 3</a> |
<a href="?page=soal4">Soal 4</a>

<hr>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'soal1':
        include "soal1.php";
        break;
    case 'soal2':
        include "soal2.php";
        break;
    case 'soal3':
        include "soal3.php";
        break;
    case 'soal4':
        include "soal4.php";
        break;
    default:
        echo "Pilih menu di atas";
}
?>

</body>
</html>