<?php
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah username & password
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "12345") {
        // jika benar, redirect ke halaman admin
        header("Location: admin.php");
        exit();
    } else {
        // jika salah, tampilkan pesan kesalahan
        $error = true;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
<h1>Login Admin</h1>
<?php if (isset($error)) { ?>
    <p style="color: red; font-style: italic;">Username / Password salah</p>
<?php } ?>
<ul>
    <form action="" method="post">
        <li>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="submit">Login</button>
        </li>
    </form>
</ul>
</body>
</html>