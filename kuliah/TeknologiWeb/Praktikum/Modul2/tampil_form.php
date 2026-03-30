<?php
include "../Modul1/koneksi.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menampilkan data dalam bentuk tabel</title>
    <style>
        th#title {
            text-align: center;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
    </style>
</head>
<body>
<div class="table">
    <table border="1px solid black">
        <thead>
        <tr>
            <th colspan="4" id="title">Data Mahasiswa</th>
        </tr>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM mahasiswa");
        while ($data = mysqli_fetch_array($query)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data["nim"] ?></td>
                <td><?= $data["nama"] ?></td>
                <td><?= $data["email"] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>