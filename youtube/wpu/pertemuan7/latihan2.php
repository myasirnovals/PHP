<?php

// cek apakah tidak ada data di variable superglobal $_GET
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["nrp"]) ||
    !isset($_GET["email"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["gambar"])
) {
    header("Location: latihan1.php");
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Mahasiswa</title>
</head>
<body>
<h1>Detail Mahasiswa</h1>
<ul>
    <li><img src="img/<?= $_GET["gambar"]; ?>" alt="" width="155"></li>
    <li><?= $_GET["nama"]; ?></li>
    <li><?= $_GET["nrp"] ?></li>
    <li><?= $_GET["email"] ?></li>
    <li><?= $_GET["jurusan"] ?></li>
</ul>

<a href="latihan1.php">Kembali ke halaman mahasiswa</a>
</body>
</html>
