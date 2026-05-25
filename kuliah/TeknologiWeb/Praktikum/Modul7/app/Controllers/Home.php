<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['url', 'form']);
    }

    public function index()
    {
        if (session()->get('login')) {
            return view('welcome_message');
        }
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function prosesDaftar()
    {
        $fileGambar = $this->request->getFile('pp');
        $namaGambar = 'default-profile.png';

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'assets/image', $namaGambar);
        }

        $user = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama'     => $this->request->getPost('nama'),
            'url'      => $namaGambar,
        ];

        if ($this->userModel->insert($user)) {
            session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
            return redirect()->to('/');
        } else {
            return redirect()->to('/home/register');
        }
    }

    public function prosesLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user->password)) {
            session()->set([
                'login'    => true,
                'username' => $user->username,
                'nama'     => $user->nama,
                'url'      => $user->url,
            ]);

            return redirect()->to('/');
        }

        session()->setFlashdata('error', 'Username atau password salah.');
        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}