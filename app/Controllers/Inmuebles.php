<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InmuebleModel;

class Inmuebles extends BaseController
{
    function __construct()
    {
        $inmueble = new InmuebleModel();
    }
    public function index()
    {

        //
        $data = ['titulo'=> "Listado de Inmuebles"];

        return view('/Admin/home/inmuebles', $data);
    }

    public function registro()
    {
       // $inmuebles = new InmuebleModel();
       
        $data = ['titulo'=> "Registro de Inmuebles"];

        return view('/Admin/home/registro', $data);

    }
}
