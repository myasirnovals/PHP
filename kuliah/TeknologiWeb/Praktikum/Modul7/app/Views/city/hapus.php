<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus City</title>
    <link rel="stylesheet" href="<?= base_url('css/app-theme.css') ?>">
</head>
<body>
    <main class="container">
        <header class="topbar">
            <h3 class="brand">Praktikum Teknologi Web</h3>
            <nav class="links">
                <a class="link-pill" href="<?= site_url('/') ?>">Home</a>
                <a class="link-pill" href="<?= site_url('country') ?>">Country</a>
                <a class="link-pill" href="<?= site_url('city') ?>">City</a>
                <a class="link-pill" href="<?= site_url('language') ?>">Language</a>
            </nav>
        </header>

        <section class="page-card">
            <h1 class="page-title">Hapus Data Kota</h1>
            <p>Apakah Anda yakin menghapus kota <b><?= $kota->Name ?></b>?</p>
            <form action="<?= site_url('city/proses_hapus/'.$kota->ID) ?>" method="post">
                <div class="form-actions">
                    <button class="btn btn-danger" type="submit">Ya, Hapus</button>
                    <a class="btn btn-secondary" href="<?= site_url('city') ?>">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>