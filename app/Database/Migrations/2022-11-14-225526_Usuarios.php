<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'=> [
                'type'=> 'INT',
                'constraint'=> 5,
                'unsigned'=> true,
                'auto_increment'=> true,
            ],
            'nombre'=> [
                'type'=> 'VARCHAR',
                'constraint'=> '100',
            ],
            'password'=> [
                'type'=> 'VARCHAR',
                'constraint'=> '255',
            ],
            'email'=> [
                'type'=> 'VARCHAR',
                'constraint'=> '120',
            ],
            'foto'=> [
                'type'=> 'VARCHAR',
                'null'=>'false',
                'constraint'=> '100',
            ],
            'es_admin'=> [
                'type'=> 'BOOLEAN',
                'null'=>'false',
                'default'=> false,
            ],
            'activo'=> [
                'type'=> 'BOOLEAN',
                'null'=>'false',
                'default'=> false,
            ],
            'creado_en'=> [
                'type'=> 'DATETIME',
                'null'=> true,
                'default'=> null,
            ],
            'editado_en'=> [
                'type'=> 'DATETIME',
                'null'=> true,
                'default'=> null,
            ],
            'eliminado_en'=> [
                'type'=> 'DATETIME',
                'null'=> true,
                'default'=> null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');

    }

    public function down()
    {
        //Crear la tabla
        $this->forge->dropTable('usuarios');
    }
}
