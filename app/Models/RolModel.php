<?php

namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table      = 'rol';
    protected $primaryKey = 'idrol';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombrerol', 'fecha_alta', 'fecha_edit'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}