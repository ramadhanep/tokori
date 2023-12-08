<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'CHAR', 'constraint' => 10],
            'payment_method_id' => ['type' => 'CHAR', 'constraint' => 10],
            'customer_name'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'total_sale_amount' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'tax_amount'        => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'total_amount'      => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'pay_amount'        => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'return_amount'     => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'status'            => ['type' => 'ENUM', 'constraint' => ['Draft', 'Selesai'], 'default' => 'Selesai'],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sales', true);
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
