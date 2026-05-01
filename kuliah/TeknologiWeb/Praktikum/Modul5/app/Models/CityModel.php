<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model {
    protected $table = 'city';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['Name', 'CountryCode', 'District', 'Population'];

    public function getCity(): array
    {
        return $this->findAll();
    }
}