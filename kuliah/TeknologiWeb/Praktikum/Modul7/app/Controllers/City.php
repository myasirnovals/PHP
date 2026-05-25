<?php 
namespace App\Controllers; 
use App\Models\CityModel; 
use App\Models\CountryModel; 

class City extends BaseController 
{ 
    protected $cityModel; 
    
    public function __construct() 
    { 
        $this->cityModel = new CityModel(); 
    } 
    
    public function index() 
    { 
        $data['list_kota'] = $this->cityModel->findAll(); 
        return view('city/index', $data); 
    } 
    
    public function tambah() 
    { 
        $countryModel = new CountryModel(); 
        $data['negara'] = $countryModel->findAll(); 
        return view('city/tambah', $data); 
    } 
    
    public function simpan() 
    { 
        $this->cityModel->insert([ 
            'Name' => $this->request->getPost('nama'), 
            'CountryCode' => $this->request->getPost('kode_negara'), 
            'District' => $this->request->getPost('distrik'), 
            'Population' => $this->request->getPost('populasi'), 
        ]); 
        return redirect()->to('/city'); 
    } 
    
    public function edit($id) 
    { 
        $countryModel = new CountryModel(); 
        $data = [ 
            'kota' => $this->cityModel->find($id), 
            'negara' => $countryModel->findAll() 
        ]; 
        return view('city/edit', $data); 
    } 
    
    public function update($id) 
    { 
        $this->cityModel->update($id, [ 
            'Name' => $this->request->getPost('nama'), 
            'CountryCode' => $this->request->getPost('kode_negara'), 
            'District' => $this->request->getPost('distrik'), 
            'Population' => $this->request->getPost('populasi'), 
        ]); 
        return redirect()->to('/city'); 
    } 
    
    public function hapus($id) 
    { 
        $data['kota'] = $this->cityModel->find($id); 
        return view('city/hapus', $data); 
    } 
    
    public function proses_hapus($id) 
    { 
        $this->cityModel->delete($id); 
        return redirect()->to('/city'); 
    } 
}