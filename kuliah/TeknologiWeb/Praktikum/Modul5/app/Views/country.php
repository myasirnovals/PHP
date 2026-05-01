<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Negara</title>
</head>
<body>
<h1>Daftar Negara</h1>
<table border="1" align="center">
    <tr>
        <th>Code</th>
        <th>Name</th>
    </tr>
    <?php $country = $country ?? []; ?>
    <?php if ($country !== []) : ?>
        <?php foreach ($country as $row) : ?>
            <tr>
                <td><?= esc($row['Code']) ?></td>
                <td><?= esc($row['Name']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="2">Data negara belum tersedia.</td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>