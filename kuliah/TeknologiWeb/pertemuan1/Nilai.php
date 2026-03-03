<?php

class Nilai
{
    private $mataKuliah;
    private $skor;

    public function __construct($mataKuliah, $skor)
    {
        $this->mataKuliah = $mataKuliah;
        $this->skor = $skor;
    }

    public function getMataKuliah()
    {
        return $this->mataKuliah;
    }

    public function getSkor()
    {
        return $this->skor;
    }

}