<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PagoModel;
use App\Models\InmuebleModel;
use App\Models\UsuarioModel;
use Config\Services\session;


class Pagos extends BaseController
{
    protected $pago;
    protected $usuarioModel;
    protected $rolModel;
    protected $session;
    protected $time;
    function __construct()
    {
        /* Cargando biblioteca model y de sesión de usuario */
        $this->usuarioModel = new \App\Models\UsuarioModel();
        $this->rolModel = new \App\Models\RolModel();
        $this->session = \Config\Services::session();
        $this->pago = new PagoModel();
        helper(['url', 'form']);
        helper(['Fecha_helper']);
         // Cargar la librería Time
        $this->time = new \CodeIgniter\I18n\Time();
    }

 
    public function index()
    {
        // $users = new UsuarioModel();
        //  $roles = new RolModel();

        $usuarios = $this->usuarioModel->findAll();
        $roles = $this->rolModel->findAll();
        $pagos = $this->pago->findAll();

        $data = [
            'titulo' => "Lista de Pago de Inquilinos",
            'usuarios' => $this->usuarioModel->obtenerUsuariosConRol(),
            'pago'=>$pagos,
            'sesion_usuario' => $this->session->get('usuario')
        ];

        /* Llamando las vistas */
          // dd($data);
        return view('/Admin/pago/index', $data);
    }
    public function hacerpago()
    {
        //mostrar la vista para hacer pago
        $data = [
            'titulo' => "Hacer Pago de Inquilinos",
      
            'sesion_usuario' => $this->session->get('usuario')
        ];
        return view ('/Admin/pago/hacerpago', $data);


}
public function pagaralquiler($id)
{
    $data = [
        'id' => $id,
        'titulo' => "Hacer Pago del Inquilino".$id,
    ];
    return view ('/Admin/pago/pagaralquiler', $data);

}

}
