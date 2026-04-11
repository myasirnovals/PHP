<?php

class Circle {
    public $jariJari;
    public $luas;
    public $keliling;

    public function getJariJari()
    {
        return $this->jariJari;
    }

    public function setJariJari($jariJari)
    {
        $this->jariJari = $jariJari;
    }

    public function getLuas()
    {
        return $this->luas;
    }

    public function setLuas($luas)
    {
        $this->luas = $luas;
    }

    public function getKeliling()
    {
        return $this->keliling;
    }

    public function setKeliling($keliling)
    {
        $this->keliling = $keliling;
    }

    public function hitungLuas()
    {
        $this->luas = $this->jariJari * $this->jariJari * 3.14;
    }

    public function hitungKeliling()
    {
        $this->keliling = $this->jariJari * 2 * 3.14;
    }
}

$circle = new Circle();
$circle->setJariJari(7);
$circle->hitungLuas();
$circle->hitungKeliling();

echo "Hasil hitung luas dan keliling lingkaran:<br>";
echo "1. Jari-jari lingkaran: " . $circle->getJariJari();
echo "<br>";
echo "2. Luas lingkaran: " . $circle->getLuas();
echo "<br>";
echo "3. Keliling lingkaran: " . $circle->getKeliling();

