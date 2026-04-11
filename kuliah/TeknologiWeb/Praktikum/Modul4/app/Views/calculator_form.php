<!DOCTYPE html>
<html lang="id">
<head>
    <title>Calculator</title>
</head>
<body>
    <h2>Tambah Bilangan</h2>
    <form action="<?= base_url('calc/hitung'); ?>" method="POST">
        <table>
            <tr>
                <td>Bilangan 1</td>
                <td>: <input type="text" name="bil1" required></td>
            </tr>
            <tr>
                <td>Bilangan 2</td>
                <td>: <input type="text" name="bil2" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Tambah">
                </td>
            </tr>
        </table>
    </form>

    <h2>Hasil Tambah</h2>
    <?php if (isset($hasil)) : ?>
        <p>Hasilnya adalah: <b><?= esc($hasil); ?></b></p>
    <?php endif; ?>
</body>
</html>