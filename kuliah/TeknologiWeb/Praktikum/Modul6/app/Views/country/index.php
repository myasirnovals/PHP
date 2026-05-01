<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
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
            <h1 class="page-title">Daftar Negara</h1>
            <div class="actions">
                <a class="btn" href="<?= site_url('country/tambah') ?>">+ Tambah Negara</a>
            </div>

            <div class="table-wrap">
                <table>
                    <tr>
                        <th>Kode</th><th>Nama</th><th>Benua</th><th>Wilayah</th><th>Aksi</th>
                    </tr>
                    <?php foreach ($list_negara as $n) : ?>
                    <tr>
                        <td><?= $n->Code ?></td>
                        <td><?= $n->Name ?></td>
                        <td><?= $n->Continent ?></td>
                        <td><?= $n->Region ?></td>
                        <td>
                            <a href="<?= site_url('country/edit/'.$n->Code) ?>">Edit</a> |
                            <a href="<?= site_url('country/hapus/'.$n->Code) ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
