<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        //
        $data = ['titulo'=> "Login Administrador"];

        return view('/Admin/home/index', $data);
    }

    public function inmuebles()
    {
        //
        $data = ['titulo'=> "Lista de Inmuebles"];

        return view('/Admin/home/index', $data);
    }
}
