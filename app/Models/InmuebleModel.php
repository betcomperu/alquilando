<?php

namespace App\Models;

use CodeIgniter\Model;

class InmuebleModel extends Model
{
   
    protected $table            = 'inmuebles';
    protected $primaryKey       = 'id_inmueble';

    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;
    protected $allowedFields    = ['direccion','detalles', 'foto', 'estado', 'precio',
                                     'nombre_inmueble','distrito'  ];

    // Dates
    protected $useTimestamps = true;
   
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;


}
