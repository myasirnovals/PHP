<?php

namespace App\Controllers;

// 1. Ini adalah Class OOP yang sudah diperbaiki
class HitungLingkaran {
    public $jari_jari;
    
    // Hapus baris 'const PI = 3.14159;'

    public function set_jari($r) {
        $this->jari_jari = $r;
    }

    public function get_jari() {
        return $this->jari_jari;
    }

    public function get_luas() {
        // Gunakan fungsi bawaan pi() 
        return pi() * $this->jari_jari * $this->jari_jari;
    }

    public function get_keliling() {
        // Gunakan fungsi bawaan pi()
        return 2 * pi() * $this->jari_jari;
    }
}

// 2. Ini adalah Controller bawaan CI4
class Lingkaran extends BaseController
{
    public function index()
    {
        // Kita panggil class OOP-nya di sini
        $lingkaran_saya = new HitungLingkaran();
        $lingkaran_saya->set_jari(10);

        // Kita simpan hasilnya ke dalam array untuk dikirim ke View
        $data = [
            'jari'     => $lingkaran_saya->get_jari(),
            'luas'     => $lingkaran_saya->get_luas(),
            'keliling' => $lingkaran_saya->get_keliling()
        ];

        // Tampilkan ke View bernama 'Tugas_lingkaran' (karena nama file Anda huruf besar depannya)
        return view('Tugas_lingkaran', $data);
    }
}