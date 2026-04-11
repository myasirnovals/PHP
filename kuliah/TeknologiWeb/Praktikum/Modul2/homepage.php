<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Mahasiswa - UNJANI</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            text-align: center;
            padding: 50px;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3);
            display: inline-block;
            max-width: 600px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        h1 {
            color: #764ba2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        .menu-box {
            margin-top: 40px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px 35px;
            margin: 10px;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0px 5px 15px rgba(102, 126, 234, 0.4);
            border: 2px solid transparent;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0px 8px 25px rgba(102, 126, 234, 0.6);
            border: 2px solid #667eea;
        }

        .btn-tampil {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            box-shadow: 0px 5px 15px rgba(245, 87, 108, 0.4);
        }

        .btn-tampil:hover {
            transform: translateY(-3px);
            box-shadow: 0px 8px 25px rgba(245, 87, 108, 0.6);
            border: 2px solid #f5576c;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Selamat Datang di Portal Mahasiswa</h1>
    <p>Silahkan pilih menu di bawah ini untuk mengelola data:</p>

    <div class="menu-box">
        <a href="input.php" class="btn">Tambah Data Mahasiswa</a>

        <a href="tampil.php" class="btn btn-tampil">Lihat Daftar Mahasiswa</a>
    </div>
</div>

</body>

</html>