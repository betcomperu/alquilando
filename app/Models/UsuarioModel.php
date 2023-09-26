<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'usuario';
  protected $primaryKey       = 'idusuario';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $allowedFields    = ['nombre', 'correo', 'usuario', 'clave', 'rol', "foto", 'condicion', 'fecha_alta', 'fecha_edit'];

  // Dates
  /* automatic date create in database */
  protected $createdField = "fecha_alta";
  protected $updatedField = "fecha_edit";

  protected $validationRule = [
    'registro' => [
    'nombre' => 'required|min_length[3]|max_length[50]',
    'correo' => 'required|valid_email|is_unique[usuario.correo]',
    'usuario' => 'required|min_length[5]|max_length[20]|is_unique[usuario.usuario]',
    'password' => 'required|min_length[6]',
  ]
];

  

  protected $validationMessages = [
    'nombre' => [
      'required' => 'El campo nombre es obligatorio.',
      'min_length' => 'El campo nombre debe tener al menos {param} caracteres.',
      'max_length' => 'El campo nombre no puede tener más de {param} caracteres.',
    ],
    'correo' => [
      'required' => 'El campo correo es obligatorio.',
      'valid_email' => 'Ingrese un correo electrónico válido.',
      'is_unique' => 'El correo electrónico ya está registrado en nuestra base de datos.',
    ],
    'usuario' => [
      'required' => 'El campo usuario es obligatorio.',
      'min_length' => 'El campo usuario debe tener al menos {param} caracteres.',
      'max_length' => 'El campo usuario no puede tener más de {param} caracteres.',
      'is_unique' => 'El usuario ya está registrado en nuestra base de datos.',
    ],
    'password' => [
      'required' => 'El campo contraseña es obligatorio.',
      'min_length' => 'La contraseña debe tener al menos {param} caracteres.',
    ],
  ];
  protected $skypValidation = false;


  protected function antesInsertar(array $data)
  {
    $data = $this->passwordHash($data);
    $data['data']['created_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function antesActualizar(array $data)
  {
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function claveHash(array $data)
  {
    if (isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    return $data;
  }
  public function obtenerUsuariosConRol()
  {
    return $this->select('usuario.*, rol.nombrerol AS nombre_rol')
      ->join('rol', 'rol.idrol = usuario.rol', 'left')
      ->where('condicion',1)
      ->findAll();
  }
  public function eliminarUsuario($id)
    {
        $usuarioAEliminar = $this->find($id);
        
        if ($usuarioAEliminar['idusuario']===1)
         {
            return false; // No se permite eliminar al usuario con rol de Administrador
        }

        // Realizar la eliminación lógica
        $data = [
            'condicion' => 0
        ];

        $this->update($id, $data);
        return true; // Eliminación lógica realizada con éxito
    }
}
