<?php

namespace App\Models;

use CodeIgniter\Model;

class InmuebleModel extends Model
{
   
    protected $table = 'inmuebles';
    protected $primaryKey = 'id_inmueble';

    protected $returnType = 'array';
//    protected $useSoftDeletes   = true;
//    protected $protectFields    = false;
    protected $allowedFields = ['direccion','detalles', 'foto', 'estado', 'precio','condicion',
                                     'nombre_inmueble','distrito','idusuario','created_at','update_at','deleted_at' ];

    // Dates
    protected $useTimestamps = true;
       
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

  

    protected function numeroInmuebles()
    {
        $db = db_connect('alquilando');
        $builder = $db->table('inmuebles');
        $idusuario = session()->get('idusuario');
        $numeroinmuebles = $builder->select('*')->where('condicion', 1 AND 'idusuario', $idusuario)->countAll();
        echo $numeroinmuebles;

    }

    public function obtener_inmuebles_por_usuario($idusuario)
    {
        $this->where('idusuario', $idusuario);
        return $this->findAll();
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\UsuarioModel', 'idusuario');
    }
}
