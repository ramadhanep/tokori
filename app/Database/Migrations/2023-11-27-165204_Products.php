<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'CHAR', 'constraint' => 10],
            'product_category_id'   => ['type' => 'CHAR', 'constraint' => 10],
            'product_unit_id'       => ['type' => 'CHAR', 'constraint' => 10],
            'code'                  => ['type' => 'VARCHAR', 'constraint' => 255],
            'name'                  => ['type' => 'VARCHAR', 'constraint' => 255],
            'photo'                 => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'price'                 => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'quantity'              => ['type' => 'INT', 'constraint' => 10, 'default' => 0],
            'created_at'            => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'            => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'            => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('products', true);
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
