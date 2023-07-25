<?php

namespace App\Controllers;
use App\Models\InmuebleModel;
use Config\Services\session;
use CodeIgniter\Files\File;


class Home extends BaseController
{
    public function index($condicion=1, $idusuario=null)
    {
        $inmueble = new InmuebleModel();
      //  var_dump($inmueble);
       

        
    
        $data = ['titulo'=> "Listado de Inmuebles",
                 'inmuebles'=>$inmueble->select('*')->findAll(),
                 
                  'ninmuebles'=>$inmueble->select('*')->where('idusuario',$idusuario)->countAllResults(),
                  'cantidadinmo'=>$inmueble->select('*')->where('condicion',1)->countAllResults()];
                 // dd($data);
        return view('/Admin/Home/index', $data);
      return view('/Admin/Layout/aside', $data);
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
