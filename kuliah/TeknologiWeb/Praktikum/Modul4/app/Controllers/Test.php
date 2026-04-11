<?php
namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        return view('test');
    }

    public function hello()
    {
        echo "This is hello function. 2350081004 Muhamad Yasir Noval";
    }
    public function profil()
    {
        return view('profile');
    }
}