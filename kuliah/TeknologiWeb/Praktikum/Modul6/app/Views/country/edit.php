<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Country</title>
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
            <h1 class="page-title">Edit Negara: <?= $negara->Name ?></h1>
            <form action="<?= site_url('country/update/'.$negara->Code) ?>" method="post">
                <div class="form-grid">
                    <label for="kode">Kode</label>
                    <input id="kode" type="text" value="<?= $negara->Code ?>" disabled>

                    <label for="nama">Nama</label>
                    <input id="nama" type="text" name="nama" value="<?= $negara->Name ?>" required>

                    <label for="benua">Benua</label>
                    <input id="benua" type="text" name="benua" value="<?= $negara->Continent ?>" required>

                    <label for="wilayah">Wilayah</label>
                    <input id="wilayah" type="text" name="wilayah" value="<?= $negara->Region ?>" required>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">Update</button>
                    <a class="btn btn-secondary" href="<?= site_url('country') ?>">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
