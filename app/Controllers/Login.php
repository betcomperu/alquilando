<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\RolModel;
use App\Controllers\BaseController;
use Config\Services\session;

class Login extends BaseController
{
    public function __construct()
    {

        $users = new UsuarioModel();
        $roles = new RolModel();
        $this->session = \Config\Services::session();
        helper('form', 'url');
    }
    public function index()
    {
        //
        $data = ['titulo' => "Login Administrador"];

        return view('/Admin/Home/Login', $data);
    }

    public function inmuebles()
    {
        //
        $data = ['titulo' => "Lista de Inmuebles"];

        return view('/Admin/home/index', $data);
    }
    public function entrar()
    {

        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');
        $modelLogin = new UsuarioModel();
        $entrarLogin = $modelLogin->where('usuario', $usuario)->first();
        //    dd($entrarLogin);
        #Empezamos la Validacion#
        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'usuario' => [
                'label' => 'Usuario',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Es necesario que ingrese su {field} '
                ]
            ],
        ]);

        if (!$valid) {
            $sessError = [
                'errUsuario' => $validation->getError('usuario'),
                'errPassword' => $validation->getError('password')
            ];
            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login'));
        } else {
            $modelLogin = new UsuarioModel();
            $entrarLogin = $modelLogin->where('usuario', $usuario)->first();

            if ($entrarLogin == null) {
                $sessError = [
                    'errUsuario' => 'Este usuario no es valido',

                ];
                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login'));
            } else {
                $passwordUser = $entrarLogin['clave'];

                if (password_verify($password, $passwordUser)) {
                    $idUsuario = $entrarLogin['idusuario'];

                    $data = [
                        'idusuario' => $idUsuario,
                        'nombre' => $entrarLogin['nombre'],
                        'correo' => $entrarLogin['correo'],
                        'rol' => $entrarLogin['rol'],
                        'foto' => $entrarLogin['foto'],
                       
                        'isLoggedIn' => true,
                    ];

                    session()->set($data);
               //   dd($data);
                    return redirect()->to('home');
                } else {
                    $sessPassword = [
                        'errPassword' => 'Este Password no es válido',

                    ];
                    session()->setFlashdata($sessPassword);
                    return redirect()->to(site_url('login'));
                }
            }
        }
    }

    public function salir()
    {

        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . '/login');
    }
}
