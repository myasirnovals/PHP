<?php 
namespace App\Controllers; 
use App\Models\CountryModel; 

class Country extends BaseController 
{ 
    protected $countryModel; 
    
    public function __construct() 
    { 
        $this->countryModel = new CountryModel(); 
    } 
    
    public function index() 
    { 
        $data['list_negara'] = $this->countryModel->findAll(); 
        return view('country/index', $data); 
    } 
    
    public function tambah() 
    { 
        return view('country/tambah'); 
    } 

    public function simpan() 
    { 
        $this->countryModel->insert([ 
            'Code'      => $this->request->getPost('kode'),
            'Name'      => $this->request->getPost('nama'), 
            'Continent' => $this->request->getPost('benua'), 
            'Region'    => $this->request->getPost('wilayah'), 
        ]); 
        return redirect()->to('/country'); 
    } 
    
    public function edit($code) 
    { 
        $data['negara'] = $this->countryModel->find($code); 
        return view('country/edit', $data); 
    } 
    
    public function update($code) 
    { 
        $this->countryModel->update($code, [ 
            'Name'      => $this->request->getPost('nama'), 
            'Continent' => $this->request->getPost('benua'), 
            'Region'    => $this->request->getPost('wilayah'), 
        ]); 
        return redirect()->to('/country'); 
    } 
    
    public function hapus($code) 
    { 
        $data['negara'] = $this->countryModel->find($code); 
        return view('country/hapus', $data); 
    } 
    
    public function proses_hapus($code) 
    { 
        $this->countryModel->delete($code); 
        return redirect()->to('/country'); 
    } 
}