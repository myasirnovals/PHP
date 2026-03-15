<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $sql = "INSERT INTO mahasiswa (nim, nama, email) VALUES ('$nim', '$nama', '$email')";
    mysqli_query($conn, $sql);

    echo "<br> Data berhasil ditambahkan";
} else {
    echo "<br> Data gagal ditambahkan";
}

