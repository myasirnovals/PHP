<?php

$mhs1 = new MahasiswaAktif("2350081004", "Muhamad Yasir Noval", "Teknik Informatika");

$mhs1->tambahNilai(new Nilai("Teknologi Web", 4.0));
$mhs1->tambahNilai(new Nilai("Basis Data", 3.5));
$mhs1->tambahNilai(new Nilai("Struktur Data", 3.8));

echo "Nama: " . $mhs1->getNama() . PHP_EOL;
echo "IPK: " . number_format($mhs1->hitungIPK(), 2) . PHP_EOL;
echo "Status: " . $mhs1->status() . PHP_EOL;

