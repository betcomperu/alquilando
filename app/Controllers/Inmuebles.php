<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\InmuebleModel;
use Config\Services\session;
use CodeIgniter\Files\File;

class Inmuebles extends BaseController
{
    protected $helpers = ['form'];
  //  protected $session = 'null';

    function __construct()
    {
        $inmueble = new InmuebleModel();
        $this->session = \Config\Services::session();
        helper(['url', 'form']);
    }
    public function index($condicion = 1)
    {
        //
        $inmueble = new InmuebleModel();
        $data = ['titulo'=> "Listado de Inmuebles",
                'inmuebles'=>$inmueble->select('*')->where('condicion',$condicion)->findAll()];

        return view('/Admin/home/index', $data);
    }
    public function listar($condicion=1)
    {
        //
        $inmueble = new InmuebleModel();
        $data = ['titulo'=> "Listado de Inmuebles  Registrados",
        'inmuebles'=>$inmueble->select('*')->where('condicion',$condicion)->findAll()];
      
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
       $validation = service('validation');
       $validation->setRules([
            'direccion' => 'required|min_length[4]|max_length[120]',
            'detalles' => 'required|min_length[10]|max_length[120]',
         //   'foto' => 'required',
            'estado' => 'required',
            'precio' => 'required',
            'nombre_inmueble' => 'required',
            
        ]);

        if (!$validation->withRequest($this->request)->run()) {
         // dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
             
        } 
            $inmueble = new InmuebleModel();
            $img = $this->request->getFile('foto');
            if ($img->getError() === 4) {
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
           $this->session->setflashdata('registrado', "A registrado un Inmueble correctamente");
        //   dd($set);;
            return redirect()->to(base_url().'/inmuebles/listar');
        }

        public function eliminar($id)
        {
            $inmueble = new InmuebleModel();
            $data=[
                'condicion'=>0
            ];
            $inmueble->update($id,$data);
            return redirect()->to(base_url().'/inmuebles/listar');
        }
        public function eliminados($condicion=0)
        {
            
                $inmueble = new InmuebleModel();
                $data = ['titulo'=> "Listado de Inmuebles  Registrados",
                'inmuebles'=>$inmueble->select('*')->where('condicion',$condicion)->findAll()];
                return view('/Admin/home/inmuebles', $data);
            
        }
        public function edit($id_inmueble=null)
        {
            $inmueble = new InmuebleModel();
            $file = $this->request->getPost('foto');
            $data = ['titulo'=> "Editar Inmueble",
                    'inmueble' => $inmueble->select('*')->find($id_inmueble)
                        ];
                     //   dd($data);
        
            return view('/Admin/home/editar', $data);

        }
        public function update($id_inmueble = null)
    {

        $inmueble = new InmuebleModel(); // Instancio el Modelo Usuario
        $foto_item = $inmueble->find($id_inmueble); // Llamo al registro que coincide con el id
        // echo $foto_item['foto']; // Imprimimos para ver el campo "foto"

        $old_foto = $foto_item['foto'];

        if ($file = $this->request->getFile('foto')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('uploads/', $imageName);
            } else {
                $imageName = $old_foto;
                $data = [
                    'direccion'=>$this->request->getPost('direccion'),
                    'detalles'=>$this->request->getPost('detalles'),
                    'foto'=>$imageName,
                    'estado'=>$this->request->getPost('estado'),
                    'precio'=>$this->request->getPost('precio'),
                    'nombre_inmueble'=>$this->request->getPost('nombre_inmueble'),
                    'distrito'=>$this->request->getPost('distrito')
                ];
                $inmueble->update($id_inmueble, $data);
            }
           session()->setFlashdata('editado', " El Inmueble ha sido Actualizado");
        return redirect()->to(base_url() . '/inmuebles/listar');
        }
        

      
    }
        }
        
       
  

