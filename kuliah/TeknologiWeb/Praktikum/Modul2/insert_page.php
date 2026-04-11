<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location: login.php");
    exit();
}

include "../Modul1/koneksi.php";

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User baru berhasil ditambahkan!'); window.location='tampil.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah User Baru</title>
</head>

<body>
<h2>Tambah Pengguna Sistem</h2>
<form method="POST" action="">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="simpan">Simpan User</button>
                <a href="tampil.php">Kembali</a>
            </td>
        </tr>
    </table>
</form>
</body>

</html>