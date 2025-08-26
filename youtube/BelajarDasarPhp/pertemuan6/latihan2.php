<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: #bada55;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>
<?php
$angka = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
?>

<?php foreach ($angka as $a) { ?>
    <?php foreach ($a as $b) { ?>
        <div class="kotak"><?= $b ?></div>
    <?php } ?>
    <div class="clear"></div>
<?php } ?>
</body>
</html>
