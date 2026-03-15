<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_tamu'];
    $email = $_POST['email'];

    $sql = "INSERT INTO tamu (nmtamu, email) VALUES ('$nama', '$email')";
    mysqli_query($conn, $sql);

    echo "<br> Data berhasil ditambahkan";
} else {
    echo "<br> Data gagal ditambahkan";
}

