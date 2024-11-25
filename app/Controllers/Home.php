<?php

namespace App\Controllers;

use App\Models\InmuebleModel;
use App\Models\PagoModel;
use App\Models\UsuarioModel;
use App\Models\RolModel;
use Config\Services\session;
use CodeIgniter\Files\File;


class Home extends BaseController
{
  public function index($condicion = 1, $idusuario = null)
  {
    $inmueble = new InmuebleModel();
    $usuario = new UsuarioModel();
    $rol = new RolModel();
    $pago = new PagoModel();
    $session = session();
    $userRol = $session->get('rol');
    // Obtener el ID del usuario logueado (inquilino)
    $inquilinoId = session()->get('idusuario');
    $montoTotalInquilino = $pago->selectSum('monto')
    ->where('id_usuario', $inquilinoId)
    ->where('activo', 1)
    ->get()
    ->getRow();
    // Agregar la consulta para obtener los pagos pendientes del inquilino
    $ppendientes = $pago->select('*')
        ->where('id_usuario', $inquilinoId)
        ->where('activo', 0)
        ->countAllResults();
    // Verificar si el resultado es nulo y asignar el monto total
$TotalInquilino = ($montoTotalInquilino && $montoTotalInquilino->monto) ? $montoTotalInquilino->monto : 0;// Sumar el monto total de los pagos
 

    $data = [
      'titulo' => "Listado de Inmuebles",

      'inmuebles' => $inmueble->select('inmuebles.*, usuario.nombre')
        ->join('usuario', 'usuario.idusuario = inmuebles.idusuario')
        ->where('inmuebles.condicion', 1)
        ->findAll(),
      'usuarios' => $usuario->select('*')
        ->where('rol', 3)
        ->where('condicion', 1)
        ->countAllResults(),
        

      'pendientes' => $pago->select('*')->where('activo', 0)->countAllResults(),
      'ppendientes' => $ppendientes, // Nueva variable para pagos pendientes del inquilino
      'pagoTotal' => $pago->getTotalMontos(),
      'montoTotalInquilino' => $TotalInquilino,

      'ninmuebles' => $inmueble->select('*')
            ->where('idusuario', $inquilinoId)
            ->countAllResults(),
      'cantidadinmo' => $inmueble->select('*')->where('condicion', 1)->countAllResults(),
      'cantidadusuarios' => $usuario->select('*')->where('condicion', 1)->countAllResults(),
      'userRol'=>$userRol
    ];
   // dd($data);
 
    if ($_SESSION['rol'] == 1) {
      return view('/Admin/Layout/aside', $data)
           . view('/Admin/Home/index', $data);
  }
  
  if ($_SESSION['rol'] == 3) {
      return view('/Admin/Usuario/aside', $data)
           . view('/Admin/Home/index_user', $data);
  }
  
  }

  public function get_gold_prices()
  {
    $apiUrl = 'https://www.alphavantage.co/query';
    $apiKey = 'TU_CLAVE_DE_API';

    $params = [
      'function' => 'TIME_SERIES_INTRADAY',
      'symbol' => 'XAUUSD',
      'interval' => '5min',
      'apikey' => $apiKey,
    ];

    $url = $apiUrl . '?' . http_build_query($params);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    return $this->response->setJSON($data);
  }
}
