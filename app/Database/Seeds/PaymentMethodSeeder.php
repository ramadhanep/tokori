<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'         => 'PYMT0001',
                'name'       => 'CASH',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PYMT0002',
                'name'       => 'CREDIT CARD',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PYMT0003',
                'name'       => 'BANK TRANSFER',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PYMT0004',
                'name'       => 'GOPAY',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PYMT0005',
                'name'       => 'DANA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PYMT0006',
                'name'       => 'OVO',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 'PYMT0008',
                'name'       => 'SHOPEE PAY',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('payment_methods')->insertBatch($datas);
    }
}
