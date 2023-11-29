<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'CHAR', 'constraint' => 10],
            'role'          => ['type' => 'ENUM', 'constraint' => ['Manajer', 'Kasir'], 'default' => 'Kasir'],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'photo'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_active'     => ['type' => 'BOOLEAN', 'default' => false],
            'password'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'    => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'    => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'    => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
