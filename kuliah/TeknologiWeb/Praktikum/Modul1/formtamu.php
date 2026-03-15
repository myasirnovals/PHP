<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Tamu</title>
</head>
<body>
<h1>Tambah Tamu</h1>
<form action="add_tamu.php" method="post">
    <label for="nama_tamu">Nama Tamu:</label><br>
    <input type="text" id="nama_tamu" name="nama_tamu" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
