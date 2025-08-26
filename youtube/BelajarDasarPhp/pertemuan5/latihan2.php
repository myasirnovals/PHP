<?php

// pengulangan pada array
// for / foreach
$angka = [
    1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan 2</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            color: white;
            font-weight: bolder;
            margin: 3px;
            float: left;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>
<?php for ($i = 0; $i < count($angka); $i++) { ?>
    <div class="kotak"><?= $angka[$i]; ?></div>
<?php } ?>

<div class="clear"></div>

<?php foreach ($angka as $a) { ?>
    <div class="kotak"><?= $a; ?></div>
<?php } ?>

<div class="clear"></div>

<?php foreach ($angka as $a) : ?>
    <div class="kotak"><?= $a ?></div>
<?php endforeach; ?>
</body>
</html>