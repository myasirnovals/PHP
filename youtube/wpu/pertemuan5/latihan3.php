<?php

$mahasiswa = [
    ["Muhamad Yasir Noval", "043040023", "Teknik Informatika", "example@example.com"],
    ["Muhamad Yusron Noval", "043040023", "Teknik Informatika", "example@example.com"],
    ["Erick Eka Prasetya", "043040023", "Teknik Informatika", "example@example.com"],
    ["Handika", "043040023", "Teknik Informatika", "example@example.com"],
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>

<?php foreach ($mahasiswa as $mhs) { ?>
    <ul>
        <li>Nama : <?= $mhs[0] ?></li>
        <li>NRP : <?= $mhs[1] ?></li>
        <li>Jurusan : <?= $mhs[2] ?></li>
        <li>Email : <?= $mhs[3] ?></li>
    </ul>
<?php } ?>
</body>
</html>
