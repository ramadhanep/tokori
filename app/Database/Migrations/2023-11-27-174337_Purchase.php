<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Purchase extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'CHAR', 'constraint' => 10],
            'supplier_id'       => ['type' => 'CHAR', 'constraint' => 10],
            'payment_method_id' => ['type' => 'CHAR', 'constraint' => 10],
            'date'              => ['type' => 'TIMESTAMP'],
            'note'              => ['type' => 'TEXT', 'null' => true],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('purchase', true);
    }

    public function down()
    {
        $this->forge->dropTable('purchase');
    }
}
