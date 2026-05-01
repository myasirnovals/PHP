<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Bahasa</title>
</head>
<body>
<h1>Daftar Bahasa</h1>
<table border="1">
    <thead>
    <tr>
        <th>Language</th>
        <th>Is Official</th>
        <th>Percentage</th>
    </tr>
    </thead>
    <tbody>
    <?php $language = $language ?? []; ?>
    <?php if ($language !== []): ?>
        <?php foreach ($language as $lang): ?>
            <tr>
                <td><?= esc($lang['Language']) ?></td>
                <td><?= esc($lang['IsOfficial']) ?></td>
                <td><?= esc($lang['Percentage']) ?>%</td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Data bahasa belum tersedia.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>