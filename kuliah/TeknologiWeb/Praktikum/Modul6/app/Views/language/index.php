<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language</title>
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
            <h1 class="page-title">Daftar Bahasa</h1>
            <div class="actions">
                <a class="btn" href="<?= site_url('language/tambah') ?>">+ Tambah Bahasa</a>
            </div>

            <div class="table-wrap">
                <table>
                    <tr>
                        <th>Kode Negara</th><th>Bahasa</th><th>Resmi</th><th>Persentase</th><th>Aksi</th>
                    </tr>
                    <?php foreach ($list_bahasa as $b) : ?>
                    <tr>
                        <td><?= $b->CountryCode ?></td>
                        <td><?= $b->Language ?></td>
                        <td><?= $b->IsOfficial ?></td>
                        <td><?= $b->Percentage ?></td>
                        <td>
                            <a href="<?= site_url('language/edit/'.rawurlencode($b->CountryCode).'/'.rawurlencode($b->Language)) ?>">Edit</a> |
                            <a href="<?= site_url('language/hapus/'.rawurlencode($b->CountryCode).'/'.rawurlencode($b->Language)) ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
