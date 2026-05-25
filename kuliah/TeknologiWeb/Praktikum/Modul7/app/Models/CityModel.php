<?php 
namespace App\Models; 
use CodeIgniter\Model; 

class CityModel extends Model 
{ 
    protected $table = 'city'; 
    protected $primaryKey = 'ID'; 
    protected $useAutoIncrement = true; 
    protected $returnType = 'object'; 
    protected $allowedFields = ['Name', 'CountryCode', 'District', 'Population']; 
}