<?php
namespace App\Controllers;

class TugasModul4 extends BaseController
{
    public function index()
    {
        // Code dari tugas dikonversi ke format CI4
        $data['nama']    = "Herdi Ashaury"; // Ganti dengan nama Anda
        $data['nim']     = "3411101111";    // Ganti dengan NIM Anda
        $data['jurusan'] = ['jurusan' => 'Informatika']; 
        
        return view('tugas_biodata', $data);
    }
}