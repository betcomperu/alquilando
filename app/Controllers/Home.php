<?php

namespace App\Controllers;
use App\Models\InmuebleModel;
use Config\Services\session;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    public function index($condicion=1)
    {
        $inmueble = new InmuebleModel();
        $data = ['titulo'=> "Listado de Inmuebles",
                  'inmuebles'=>$inmueble->select('*')->findAll(),
                  'ninmuebles'=>$inmueble->select('*')->where('condicion',$condicion)->countAllResults()];
        return view('/Admin/Home/index', $data);
    }
  
 
  }
