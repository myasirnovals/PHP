<?php

include "../Modul1/koneksi.php";

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);

echo "<br><br>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "NIM: " . $row["nim"] . " - Nama: " . $row["nama"] . " " . $row["email"] . "<br>";
}

mysqli_close($conn);