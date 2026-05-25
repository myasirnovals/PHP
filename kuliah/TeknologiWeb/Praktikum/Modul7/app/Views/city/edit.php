<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit City</title>
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
            <h1 class="page-title">Edit Kota: <?= $kota->Name ?></h1>
            <form action="<?= site_url('city/update/'.$kota->ID) ?>" method="post">
                <div class="form-grid">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" name="nama" value="<?= $kota->Name ?>" required>

                    <label for="kode_negara">Negara</label>
                    <select id="kode_negara" name="kode_negara" required>
                        <?php foreach ($negara as $n) : ?>
                        <option value="<?= $n->Code ?>" <?= ($n->Code == $kota->CountryCode) ? 'selected' : '' ?>><?= $n->Name ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="distrik">Distrik</label>
                    <input id="distrik" type="text" name="distrik" value="<?= $kota->District ?>" required>

                    <label for="populasi">Populasi</label>
                    <input id="populasi" type="number" name="populasi" value="<?= $kota->Population ?>" required>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">Update</button>
                    <a class="btn btn-secondary" href="<?= site_url('city') ?>">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>