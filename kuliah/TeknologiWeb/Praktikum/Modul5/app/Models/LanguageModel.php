<?php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table = 'countrylanguage';
    protected $primaryKey = 'CountryCode';
    protected $returnType = 'array';
    protected $allowedFields = ['Language', 'IsOfficial', 'Percentage'];

    public function getLanguage(): array
    {
        return $this->findAll();
    }
}