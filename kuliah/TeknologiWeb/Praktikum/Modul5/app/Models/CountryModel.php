<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table = 'country';
    protected $primaryKey = 'Code';
    protected $returnType = 'array';
    protected $allowedFields = ['Code', 'Name'];

    public function getCountry(): array
    {
        return $this->findAll();
    }
}