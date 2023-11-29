<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductUnitSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'         => 'PU00000001',
                'name'       => 'Piece',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PU00000002',
                'name'       => 'Pack',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PU00000003',
                'name'       => 'Box',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('product_units')->insertBatch($datas);
    }
}
