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
    protected $allowedFields    = ['metodo_pago','detalle', 'numero_operacion', 'monto', 'entidad_bancaria', 'fecha_pago', 'id_inmueble', 'id_usuario', 'activo'];

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

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = db_connect();
    }
#Funcion para formatear fecha de pago
private function formatDates($pagos) {
    foreach ($pagos as &$pago) {
        $pago['fecha_pago'] = date("d-m-Y", strtotime($pago['fecha_pago']));
    }
    return $pagos;
}
  public function insertaPago($idpago,$detalle, $metodo_pago,$numero_operacion, $monto, $entidad_bancaria, $fecha_pago, $id_inmueble, $id_usuario, $activo){

    $this->insert([
        'idpagos' => $idpago,
        'detalle' => $detalle,
        'metodo_pago' => $metodo_pago,
        'numero_operacion' => $numero_operacion,
        'monto' => $monto,
        'entidad_bancaria' => $entidad_bancaria,
        'fecha_pago' => $fecha_pago,
        'id_inmueble' => $id_inmueble,
        'id_usuario' => $id_usuario,
        'activo' => 1
    ]);
    return $this->insertID();
}
public function getPagos($id_usuario)
{
    $pagos= $this->where('id_usuario', $id_usuario)->findAll();
    return $this->formatDates($pagos);
}
public function Pagos()
{
    $pagos= $this->findAll();
    return $this->formatDates($pagos);
}
public function updatePago($id, $data)
{
    $builder = $this->db->table('pagos');
    $builder->where('idpagos', $id);
    return $builder->update($data);
}


public function obtenerPagosPorIdUsuario($idpagos)
{
    $query = $this->db->table('pagos')
        ->select('*')
        ->where('id_usuario', $idpagos)
        ->get();

    return $query->getResultArray();
}

public function obtenerPagoPorId($idpagos)
    {
        $query = $this->db->table('pagos')
        ->select('*')
        ->where('idpagos', $idpagos)
        ->get();

    return $query->getResultArray();
    }

    public function obtenerNombrePorId($idpagos)
{
    // Obtener el pago y la información del usuario
     $pago = $this->db->table('pagos')
        ->select('pagos.*, usuario.nombre')
        ->join('usuario', 'pagos.id_usuario = usuario.idusuario')
        ->where('pagos.idpagos', $idpagos)
        ->get()
        ->getRowArray();

    return $pago;
}

public function obtenerInmueblePorId($idpagos)
{
    // Obtener el pago y la información del usuario
    $inmueble = $this->db->table('pagos')
        ->select('pagos.*, inmuebles.direccion')
        ->join('inmuebles', 'pagos.id_inmueble = inmuebles.id_inmueble')
        ->where('pagos.idpagos', $idpagos)
        ->get()
        ->getRowArray();

    return $inmueble;
}

}