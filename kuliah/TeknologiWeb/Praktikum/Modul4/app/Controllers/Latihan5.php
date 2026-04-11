<?php
namespace App\Controllers;

class Latihan5 extends BaseController
{
    public function index()
    {
        // Menampilkan form login
        return view('latihan5_login');
    }

    public function signin()
    {
        $username = $this->request->getPost('username');

        $data['username'] = $username;
        
        return view('latihan5_welcome', $data);
    }
}