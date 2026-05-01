<?php 
namespace App\Models; 
use CodeIgniter\Model; 

class CountryModel extends Model 
{ 
    protected $table = 'country'; 
    protected $primaryKey = 'Code'; 
    protected $useAutoIncrement = false; 
    protected $returnType = 'object'; 
    protected $allowedFields = ['Code', 'Name', 'Continent', 'Region']; 
}