<?php
include "../Modul1/koneksi.php";

$nim = $_GET['nim'];
$sql = "DELETE FROM mahasiswa WHERE NIM = '$nim'";

if (mysqli_query($conn, $sql)) {
    header("location: tampil.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
