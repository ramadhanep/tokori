<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'                    => 'P000000001',
                'product_category_id'   => 'PC00000001',
                'product_unit_id'       => 'PU00000001',
                'code'                  => '8886015203115',
                'name'                  => 'Good Time (Double Choc)',
                'photo'                 => null,
                'price'                 => 15000,
                'quantity'              => 150,
                'alert_quantity'        => 10,
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('products')->insertBatch($datas);
    }
}
