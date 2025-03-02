<?php

// $_GET
$mahasiswa = [
    [
        "nama" => "Dietfred Bougainviella",
        "nrp" => "043040023",
        "email" => "yasir@example.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "dietfred.jpg"
    ],
    [
        "nama" => "Satou Hina",
        "nrp" => "043040023",
        "email" => "yasir@example.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "satou-hina.jpg",
        "tugas" => [
            90, 100, 80, 89
        ],
    ],
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Materi Get</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<ul>
    <?php foreach ($mahasiswa as $mhs) { ?>
        <li>
             <a href="latihan2.php?nama=<?= $mhs['nama']; ?>&nrp=<?= $mhs['nrp']; ?>&email=<?= $mhs['email']; ?>&jurusan=<?= $mhs['jurusan']; ?>&gambar=<?= $mhs['gambar']; ?>"><?= $mhs["nama"]; ?></a>
        </li>
    <?php } ?>
</ul>
</body>
</html>
