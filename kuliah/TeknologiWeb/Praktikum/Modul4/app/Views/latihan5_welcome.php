<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Welcome - UNJANI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('latihan5'); ?>">UNJANI</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('latihan5'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('test/profil'); ?>">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('calc'); ?>">Kalkulator</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center shadow-sm py-5">
                    <div class="card-body">
                        <h4 class="text-secondary">Welcome <?= esc($username); ?>!</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>