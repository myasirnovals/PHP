<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $allowedFields = ['username', 'password', 'nama', 'url'];
}