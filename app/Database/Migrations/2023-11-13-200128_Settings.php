<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Companies extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'CHAR', 'constraint' => 8],
            'company_name'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'company_logo'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'sales_tax'     => ['type' => 'INT', 'constraint' => 3],
            'created_at'    => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at'    => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'    => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
