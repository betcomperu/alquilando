<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pagos';
    protected $primaryKey       = 'idpagos';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['metodo_pago', 'numero_operacion', 'monto', 'comprobante', 'fecha_pago', 'id_inmueble', 'id_usuario', 'activo'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

  public function insertaPago($idpago, $metodo_pago,$numero_operacion, $monto, $comprobante, $fecha_pago, $id_inmueble, $id_usuario, $activo){

    $this->insert([
        'idpagos' => $idpago,
        'metodo_pago' => $metodo_pago,
        'numero_operacion' => $numero_operacion,
        'monto' => $monto,
        'comprobante' => $comprobante,
        'fecha_pago' => $fecha_pago,
        'id_inmueble' => $id_inmueble,
        'id_usuario' => $id_usuario,
        'activo' => 1
    ]);
    return $this->insertID();
}
public function getPagos($id_usuario)
{
    return $this->where('id_usuario', $id_usuario)->findAll();
}
public function Pagos()
{
    return $this->findAll();
}



public function obtenerPagoPorId($idpagos)
{
    return $this->where('idpagos', $idpagos)->first();
}

}