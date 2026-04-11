<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UNJANI - Login Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('latihan5'); ?>">UNJANI</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="<?= base_url('latihan5'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('test/profil'); ?>">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('calc'); ?>">Kalkulator</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <form action="<?= base_url('latihan5/signin'); ?>" method="POST">
                            <div class="form-group">
                                <label for="username" class="text-muted">USERNAME</label>
                                <input type="text" name="username" id="username" class="form-control text-center" placeholder="Masukkan username" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>