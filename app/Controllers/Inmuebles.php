<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InmuebleModel;
use Config\Services\session;
use CodeIgniter\Files\File;

class Inmuebles extends BaseController
{
    protected $helpers = ['form'];

    function __construct()
    {
        $inmueble = new InmuebleModel();
        $this->session = \Config\Services::session();
       
        helper(['url', 'form']);
    }
    public function index()
    {
        
        //
        $inmueble = new InmuebleModel();
        $data = ['titulo'=> "Listado de Inmuebles",
        'inmuebles'=>$inmueble->select('*')->findAll() ];

        return view('/Admin/home/inmuebles', $data);
    }

    public function registro()
    {
       // $inmuebles = new InmuebleModel();
       $inmueble = new InmuebleModel();
       
        $data = ['titulo'=> "Registro de Inmuebles",
                    ];

        return view('/Admin/home/registro', $data);

    }
    public function insertar()
    {
        $inmueble = new InmuebleModel();
        $img = $this->request->getfile('foto');
      //  dd($inmueble);
        if (! $img->getError() === 4) {
            $imageName = 'default.png';
        }else{
            $imageName= $img->getRandomName();
            $img->move('uploads/',$imageName);
        }

        $inmueble->save([
            'direccion'=>$this->request->getPost('direccion'),
            'detalles'=>$this->request->getPost('detalles'),
            'foto'=>$imageName,
            'estado'=>$this->request->getPost('estado'),
            'precio'=>$this->request->getPost('precio'),
            'nombre_inmueble'=>$this->request->getPost('nombre_inmueble'),
            'distrito'=>$this->request->getPost('distrito')
        ]);
       
        return redirect()->to(base_url().'/inmuebles');

    }
}
