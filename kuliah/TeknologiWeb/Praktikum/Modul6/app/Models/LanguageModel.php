<?php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table = 'countrylanguage';
    protected $primaryKey = 'CountryCode';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $allowedFields = ['CountryCode', 'Language', 'IsOfficial', 'Percentage'];
}
