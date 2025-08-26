<?php

// koneksi ke database mysql
$conn = mysqli_connect("localhost:3307", "root", "root", "phpdasar");

// ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari obejct result
/**
 * mysqli_fetch_row() // mengembalikan array numeri
 * mysqli_fetch_assoc() // mengembalikan array associative
 * mysqli_fetch_array() // mengembalikan keduanya
 * mysqli_fetch_object() // mengemablikan array dengan tipe opbject
 */

//while ($mhs = mysqli_fetch_object($result)) {
//    var_dump($mhs);
//    echo "<br>";
//}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $no; ?></td>
            <td>
                <a href="#">Ubah</a> |
                <a href="#">Hapus</a>
            </td>
            <td>
                <img src="img/<?= $row['gambar']; ?>" width="75">
            </td>
            <td><?= $row['nrp']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['jurusan']; ?></td>
        </tr>
        <?php $no++; ?>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
