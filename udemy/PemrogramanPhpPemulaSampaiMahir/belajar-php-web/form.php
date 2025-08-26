<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form PHP</title>
</head>
<body>
<h1>Register</h1>
<form action="post.php" method="post">
    <label for="first_name">First Name: </label>
    <input type="text" name="first_name" id="first_name">
    <br>
    <label for="last_name">Last Name: </label>
    <input type="text" name="last_name" id="last_name">
    <br>
    <input type="submit" value="Register">
</form>
</body>
</html>
