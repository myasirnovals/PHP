<?php
//$mahasiswa = [
//    ["Yasir Noval", "043040023", "example@example.com", "Teknik Informatika"],
//    ["Yusron Noval", "043040023", "example@example.com", "Teknik Informatika"],
//    ["Erik Eka", "043040023", "example@example.com", "Teknik Informatika"],
//    ["Handika", "043040023", "example@example.com", "Teknik Informatika"],
//];

// Array associative
// key-nya adalah string yang kita buat sendiri
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

// memanggil array tripel dimensi
//echo $mahasiswa[1]["tugas"][1];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Array Associative</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<?php foreach ($mahasiswa as $mhs) { ?>
    <ul>
        <li>
            <img src="img/<?= $mhs['gambar'] ?>" alt="" width="100px">
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NRP : <?= $mhs["nrp"]; ?></li>
        <li>Email : <?= $mhs["email"]; ?></li>
        <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
    </ul>
<?php } ?>
</body>
</html>
