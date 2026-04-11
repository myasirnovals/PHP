<?php
session_start();

if ($_SESSION['status'] != "login") {
    header("location: login.php?pesan=belum_login");
    exit();
}

include "../Modul1/koneksi.php";

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);


echo "<h2>Data Mahasiswa</h2>";
echo "<a href='insert_page.php'>Tambah Data Baru</a><br><br>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>";

$no = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row["nim"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";

        echo "<td>
                <a href='tampil_form_edit.php?nim=" . $row["nim"] . "'>Edit</a> | 
                <a href='tampil_form_delete.php?nim=" . $row["nim"] . "' onclick='return confirm(\"Yakin ingin menghapus data?\")'>Hapus</a>
              </td>";
        echo "</tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
}

echo "</table>";
mysqli_close($conn);
