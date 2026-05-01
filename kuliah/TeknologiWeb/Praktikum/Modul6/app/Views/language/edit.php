<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Language</title>
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
            <h1 class="page-title">Edit Bahasa: <?= $bahasa->Language ?></h1>
            <form action="<?= site_url('language/update/'.rawurlencode($bahasa->CountryCode).'/'.rawurlencode($bahasa->Language)) ?>" method="post">
                <div class="form-grid">
                    <label for="kode_negara">Negara</label>
                    <select id="kode_negara" name="kode_negara" required>
                        <?php foreach ($negara as $n) : ?>
                        <option value="<?= $n->Code ?>" <?= ($n->Code == $bahasa->CountryCode) ? 'selected' : '' ?>><?= $n->Code ?> - <?= $n->Name ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="bahasa">Bahasa</label>
                    <input id="bahasa" type="text" name="bahasa" value="<?= $bahasa->Language ?>" required>

                    <label for="is_resmi">Resmi</label>
                    <select id="is_resmi" name="is_resmi" required>
                        <option value="T" <?= ($bahasa->IsOfficial == 'T') ? 'selected' : '' ?>>T</option>
                        <option value="F" <?= ($bahasa->IsOfficial == 'F') ? 'selected' : '' ?>>F</option>
                    </select>

                    <label for="persentase">Persentase</label>
                    <input id="persentase" type="number" step="0.01" name="persentase" value="<?= $bahasa->Percentage ?>" required>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">Update</button>
                    <a class="btn btn-secondary" href="<?= site_url('language') ?>">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
