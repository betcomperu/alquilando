<?php

namespace App\Controllers;
use App\Models\InmuebleModel;
use Config\Services\session;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    public function index()
    {
        $inmueble = new InmuebleModel();
        $data = ['titulo'=> "Listado de Inmuebles",
        'inmuebles'=>$inmueble->select('*')->findAll() ];
        return view('/Admin/Home/index', $data);
    }
}
