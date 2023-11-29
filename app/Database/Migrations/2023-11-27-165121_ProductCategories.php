<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'CHAR', 'constraint' => 10],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('product_categories', true);
    }

    public function down()
    {
        $this->forge->dropTable('product_categories');
    }
}
