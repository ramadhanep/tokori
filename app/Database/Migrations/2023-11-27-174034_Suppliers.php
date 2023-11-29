<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Suppliers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'CHAR', 'constraint' => 10],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 20],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('suppliers', true);
    }

    public function down()
    {
        $this->forge->dropTable('suppliers');
    }
}
