<?php
session_start();
include "../Modul1/koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['status'] = "login";
        $_SESSION['user'] = $username;
        header("location: tampil_page.php");
    } else {
        echo "<script>alert('Login Gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .login-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3);
            width: 350px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        h2 {
            text-align: center;
            color: #764ba2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            font-size: 28px;
        }

        input {
            width: 100%;
            padding: 15px;
            margin: 15px 0;
            border: 2px solid #ddd;
            box-sizing: border-box;
            border-radius: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #667eea;
        }

        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 50px;
            font-weight: bold;
            font-size: 16px;
            margin-top: 10px;
            box-shadow: 0px 5px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0px 8px 25px rgba(102, 126, 234, 0.6);
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Login System</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>

</html>