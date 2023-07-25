<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        //Sembrabdo
        $usuarioModel = new \App\Models\UsuarioModel;
        $data = [
            'nombre' => 'Alberto Chávez',
            'email'    => 'albetho@hotmail.com',
            'es_admin' => true,
        ];

        $this->db->table('usuarios')->insert($data);

        $data = [
            'nombre' => 'Jorge Mondragón',
            'email'    => 'jomondra@hotmail.com',
            'es_admin' => false,
        ];

        $this->db->table('usuarios')->insert($data);
    }
}
