<?php
namespace App\Controllers;

class Calc extends BaseController
{
    public function index()
    {
        return view('calculator_form');
    }

    public function hitung()
    {
        $x = $this->request->getPost('bil1');
        $y = $this->request->getPost('bil2');
        
        $data['hasil'] = $x + $y;
        
        return view('calculator_form', $data);
    }
}