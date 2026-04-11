<?php
include "../Modul1/koneksi.php";

$nim_lama = $_GET['nim'];
$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$nim_lama'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nim_baru   = $_POST['nim'];
    $nama_baru  = $_POST['nama'];
    $email_baru = $_POST['email'];

    $sql = "UPDATE mahasiswa SET Nama='$nama_baru', Email='$email_baru' WHERE NIM='$nim_lama'";

    if (mysqli_query($conn, $sql)) {
        header("location: tampil.php");
    } else {
        echo "Gagal mengupdate data";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
</head>

<body>
<h2>Edit Data Mahasiswa</h2>

<form method="POST" action="">
    <table>
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?php echo $data['email']; ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="update">Update Data</button>
                <a href="tampil.php">Batal</a>
            </td>
        </tr>
    </table>
</form>
</body>

</html>