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
    protected $allowedFields    = ['nombre', 'correo', 'usuario','clave','rol', "foto",'condicion', 'fecha_alta','fecha_edit'];

    // Dates
  /* automatic date create in database */
  protected $createdField = "fecha_alta";
  protected $updatedField = "fecha_edit";

  protected $validationRule = [];
  protected $validationMessages = [];
  protected $skypValidation = false;

  
  protected function antesInsertar(array $data){
      $data = $this->passwordHash($data);
      $data['data']['created_at'] = date('Y-m-d H:i:s');
      return $data;
    }
  
    protected function antesActualizar(array $data){
      $data = $this->passwordHash($data);
      $data['data']['updated_at'] = date('Y-m-d H:i:s');
      return $data;
    }
  
    protected function claveHash(array $data){
      if(isset($data['data']['password']))
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
      return $data;
    }
}
