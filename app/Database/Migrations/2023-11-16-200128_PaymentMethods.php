<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentMethods extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'CHAR', 'constraint' => 8],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('payment_methods', true);
    }

    public function down()
    {
        $this->forge->dropTable('payment_methods');
    }
}
