<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Language</title>
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
            <h1 class="page-title">Hapus Data Bahasa</h1>
            <p>Apakah Anda yakin menghapus bahasa <b><?= $bahasa->Language ?></b> dari negara <b><?= $bahasa->CountryCode ?></b>?</p>
            <form action="<?= site_url('language/proses_hapus/'.rawurlencode($bahasa->CountryCode).'/'.rawurlencode($bahasa->Language)) ?>" method="post">
                <div class="form-actions">
                    <button class="btn btn-danger" type="submit">Ya, Hapus</button>
                    <a class="btn btn-secondary" href="<?= site_url('language') ?>">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
