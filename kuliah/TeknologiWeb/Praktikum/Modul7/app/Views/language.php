<!DOCTYPE html>
<html>

<head>
    <title>Daftar Bahasa</title>
</head>

<body>
    <h1>Daftar Bahasa</h1>
    <table border="1">
        <tr>
            <th>Country Code</th>
            <th>Language</th>
            <th>Is Official</th>
            <th>Percentage</th>
        </tr>
        <?php foreach ($language as $lang): ?>
            <tr>
                <td><?= $lang['CountryCode'] ?></td>
                <td><?= $lang['Language'] ?></td>
                <td><?= $lang['IsOfficial'] ?></td>
                <td><?= $lang['Percentage'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>