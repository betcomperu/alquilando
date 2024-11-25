<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\InmuebleModel;
use App\Models\UsuarioModel;
use Config\Services\session;
use CodeIgniter\Files\File;

class Inmuebles extends BaseController
{
    protected $helpers = ['form'];
    //  protected $session = 'null';

    function __construct()
    {
        $inmueble = new InmuebleModel();
        $usuario = new UsuarioModel();
        $this->session = \Config\Services::session();
        helper(['url', 'form']);
    }
    public function index($condicion = 1)
    {
        //
        $inmueble = new InmuebleModel();
        $usuario = new UsuarioModel();
        $data = [
            'titulo' => "Listado de Inmuebles",
            'inmuebles' => $inmueble->select('*')->where('condicion', $condicion)->findAll(),
          //  'cantidadusuarios'=>$usuario->select('*')->where('condicion', $condicion)->countAllResults()
        ];

        dd($data);
        //  $data = ['titulo'=> "Listado de Inmuebles",
        //   'inmuebles'=>$inmueble->$inmueble = new InmuebleModel();findAll()];
        return view('/Admin/home/index', $data);
    }
    public function listar()
    {
        $inmueble = new InmuebleModel();
        $usuario = new UsuarioModel();
    
        $idusuario = session()->get('idusuario');
    
        if ($_SESSION['rol'] == 1) {
            // Administrador: Mostrar todos los inmuebles con los nombres de usuario asociados
            $data = [
                'titulo' => "Listado de Inmuebles",
                'inmuebles' => $inmueble->select('inmuebles.*, usuario.nombre')
                                        ->join('usuario', 'usuario.idusuario = inmuebles.idusuario')
                                        ->where('inmuebles.condicion', 1)
                                        ->findAll(),
                'cantidadusuarios' => $usuario->where('condicion', 1)->countAllResults(),
                'usuarioregistrante' => $inmueble->select('usuario.nombre')
                                                  ->join('usuario', 'usuario.idusuario = inmuebles.idusuario')
                                                  ->findAll()
            ];
            return view('/Admin/home/inmuebles', $data);
    
        } elseif ($_SESSION['rol'] == 3) {
            // Usuario: Mostrar solo los inmuebles registrados por el usuario logueado
            $data = [
                'titulo' => "Listado de Inmuebles Registrados",
                'inmuebles' => $inmueble->select('inmuebles.*, usuario.nombre')
                                        ->join('usuario', 'usuario.idusuario = inmuebles.idusuario')
                                        ->where('usuario.idusuario', $idusuario)
                                        ->where('inmuebles.condicion', 1)
                                        ->findAll()
            ];

         //   dd($data);
            return view('/Admin/home/inmuebles', $data);
        }
    
        // Redirigir o manejar casos en los que no se cumplan las condiciones anteriores
        return redirect()->to('/home');
    }
    

    public function registro()
    {
        // $inmuebles = new InmuebleModel();
        $inmueble = new InmuebleModel();
        $usuario = new UsuarioModel();

        $data = [
            'titulo' => "Registro de Inmuebles",
            'cantidadinmo' => $inmueble->select('*')->countAllResults()
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
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $inmueble = new InmuebleModel();
        $img = $this->request->getFile('foto');
        if ($img->getError() === 4) {
            $imageName = 'default.png';
        } else {
            $imageName = $img->getRandomName();
            $img->move('uploads/', $imageName);
        }

        $inmueble->save([
            'idusuario' => $this->request->getPost('idusuario'),
            'direccion' => $this->request->getPost('direccion'),
            'detalles' => $this->request->getPost('detalles'),
            'foto' => $imageName,
            'estado' => $this->request->getPost('estado'),
            'precio' => $this->request->getPost('precio'),
            'nombre_inmueble' => $this->request->getPost('nombre_inmueble'),
            'distrito' => $this->request->getPost('distrito')
        ]);
        $this->session->setflashdata('registrado', "A registrado un Inmueble correctamente");
        //  dd($set);
        return redirect()->to(base_url() . '/inmuebles/listar');
    }

    public function eliminar($id)
    {
        $inmueble = new InmuebleModel();
        $data = [
            'condicion' => 0
        ];
        $inmueble->update($id, $data);
        return redirect()->to(base_url() . '/inmuebles/listar');
    }
    public function restaurar($id)
    {
        $inmueble = new InmuebleModel();
        $data = [
            'condicion' => 1
        ];
        $inmueble->update($id, $data);
        return redirect()->to(base_url() . '/inmuebles/listar');
    }

    public function borrar($id)
{
    $inmueble = new InmuebleModel();
    $inmueble->delete($id);
    return redirect()->to(base_url() . '/inmuebles/listar');
}

    public function eliminados($condicion = 0)
    {

        $inmueble = new InmuebleModel();
        $data = [
            'titulo' => "Listado de Inmuebles  Registrados",
            'inmuebles' => $inmueble->select('inmuebles.*, usuario.nombre')
            ->join('usuario', 'usuario.idusuario = inmuebles.idusuario')
            ->where('inmuebles.condicion', 0)
            ->findAll(),
        ];
        return view('/Admin/home/eliminados', $data);
    }
    public function edit($id_inmueble = null)
    {
        $inmueble = new InmuebleModel();
        $file = $this->request->getPost('foto');
        $data = [
            'titulo' => "Editar Inmueble",
            'inmueble' => $inmueble->select('*')->find($id_inmueble)
        ];
        //   dd($data);

        return view('/Admin/home/editar', $data);
    }
    public function update($id_inmueble = null)
    {
        $inmueble = new InmuebleModel(); // Instancio el Modelo Inmueble
        $foto_item = $inmueble->find($id_inmueble); // Obtener los datos del inmueble actual
        $old_foto = $foto_item['foto']; // Obtener el nombre de la foto actual del inmueble
    
        // Verificar si se subió un nuevo archivo de imagen
        $file = $this->request->getFile('foto');
    
        // Verificar si se subió un archivo válido
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Mover el archivo de imagen a la carpeta de uploads y generar un nuevo nombre aleatorio
            $new_image_name = $file->getRandomName();
            $file->move('uploads/', $new_image_name);
    
            // Datos del inmueble con la nueva imagen
            $data = [
                'direccion' => $this->request->getPost('direccion'),
                'detalles' => $this->request->getPost('detalles'),
                'foto' => $new_image_name,
                'estado' => $this->request->getPost('estado'),
                'precio' => $this->request->getPost('precio'),
                'nombre_inmueble' => $this->request->getPost('nombre_inmueble'),
                'distrito' => $this->request->getPost('distrito')
            ];
        } else {
            // Datos del inmueble sin cambiar la imagen
            $data = [
                'direccion' => $this->request->getPost('direccion'),
                'detalles' => $this->request->getPost('detalles'),
                'foto' => $old_foto, // Mantener la imagen existente
                'estado' => $this->request->getPost('estado'),
                'precio' => $this->request->getPost('precio'),
                'nombre_inmueble' => $this->request->getPost('nombre_inmueble'),
                'distrito' => $this->request->getPost('distrito')
            ];
        }
    
        // Actualizar los datos del inmueble
        $inmueble->update($id_inmueble, $data);
    
        // Redireccionar a la página de listado de inmuebles
        session()->setFlashdata('editado', "El Inmueble ha sido actualizado correctamente.");
        return redirect()->to(base_url() . '/inmuebles/listar');
    }
    
}
