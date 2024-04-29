<?php

namespace App\Controllers;

use App\Models\InmuebleModel;
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
    $session = session();
    $userRol = $session->get('rol');

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

      'ninmuebles' => $inmueble->select('*')->where('idusuario', $idusuario)->countAllResults(),
      'cantidadinmo' => $inmueble->select('*')->where('condicion', 1)->countAllResults(),
      'cantidadusuarios' => $usuario->select('*')->where('condicion', 1)->countAllResults(),
      'userRol'=>$userRol
    ];
    //dd($userRol);
 
    if ($_SESSION['rol']==1) {
      return view('/Admin/Home/index', $data);
      return view('/Admin/Layout/aside', $data);
    }
   
    if ($_SESSION['rol'] ==3) {
      return view('/Admin/Home/index_user', $data);
      return view('/Admin/Usuario/aside', $data);
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
