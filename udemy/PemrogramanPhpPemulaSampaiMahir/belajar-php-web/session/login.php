<?php

session_start();

// if ($_SESSION['login'] == true) {
// 	header('Location: /session/member.php');
// 	exit();
// }

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if ($_POST['username'] == "yasir" && $_POST['password'] == "yasir") {
		// sukses
		$_SESSION['login'] = true;
		$_SESSION['username'] = 'yasir';
		header('Location: /session/member.php');
		exit();
	} else {
		// gagal
		$error = "Login gagal";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Belajar Login</title>
</head>
<body>
	<?php if ($error != "") { ?>
		<h2>Login Gagal</h2>
	<?php } ?>
	<h1>Login</h1>
	<form action="/session/login.php" method="post">
		<label>Username : </label>
		<input type="text" name="username">
		<br>
		<label>Password : </label>
		<input type="password" name="password">
		<br>
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>