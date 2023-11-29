<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StockAdjustmentProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'CHAR', 'constraint' => 10],
            'stock_adjustment_id'   => ['type' => 'CHAR', 'constraint' => 10],
            'product_id'            => ['type' => 'CHAR', 'constraint' => 10],
            'quantity'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'type'                  => ['type' => 'ENUM', 'constraint' => ['Penambahan', 'Pengurangan']],
            'created_at'            => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'            => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'            => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('stock_adjustment_products', true);
    }

    public function down()
    {
        $this->forge->dropTable('stock_adjustment_products');
    }
}
