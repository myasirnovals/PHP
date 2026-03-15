<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Mahasiswa</title>
</head>
<body>
<h1>Tambah Mahasiswa</h1>
<form action="add_mahasiswa.php" method="post">
    <label for="nim">NIM:</label><br>
    <input type="text" id="nim" name="nim" required><br><br>

    <label for="nama">Name:</label><br>
    <input type="text" id="nama" name="nama" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
