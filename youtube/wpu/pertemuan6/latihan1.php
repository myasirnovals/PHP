<?php

// array
// membuat array
// cara lama
$hari = array(
    "senin", "selasa", "rabu"
);

// cara baru
$bulan = [
    "januari", "februari", "maret"
];

$arr = [
    100, "teks", true
];

// menampilkan array
// versi debugging
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

// menampilkan 1 element array
echo $arr[0];