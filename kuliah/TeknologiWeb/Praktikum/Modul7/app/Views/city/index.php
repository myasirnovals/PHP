<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City</title>
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
            <h1 class="page-title">Daftar Kota</h1>
            <div class="actions">
                <a class="btn" href="<?= site_url('city/tambah') ?>">+ Tambah Kota</a>
            </div>

            <div class="table-wrap">
                <table>
                    <tr>
                        <th>Nama</th><th>Negara</th><th>Distrik</th><th>Populasi</th><th>Aksi</th>
                    </tr>
                    <?php foreach ($list_kota as $k) : ?>
                    <tr>
                        <td><?= $k->Name ?></td>
                        <td><?= $k->CountryCode ?></td>
                        <td><?= $k->District ?></td>
                        <td><?= $k->Population ?></td>
                        <td>
                            <a href="<?= site_url('city/edit/'.$k->ID) ?>">Edit</a> |
                            <a href="<?= site_url('city/hapus/'.$k->ID) ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>
    </main>
</body>
</html>