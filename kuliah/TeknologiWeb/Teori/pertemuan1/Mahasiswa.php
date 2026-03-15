<?php

class Mahasiswa
{
    private $nim;
    private $nama;
    private $prodi;
    protected $daftarNilai = [];

    public function __construct($nim, $nama, $prodi)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function tambahNilai(Nilai $nilai) {
        $this->daftarNilai[] = $nilai;
    }

    public function hitungIPK() {
        if (empty($this->daftarNilai)) return 0;

        $totalSkor = 0;
        foreach ($this->daftarNilai as $nilai) {
            $totalSkor += $nilai->getSkor();
        }
    }

}