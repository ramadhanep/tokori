<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'id'            => 'ST00000001',
                'company_name'  => 'Tokori Store',
                'sales_tax'     => 11,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('settings')->insertBatch($datas);
    }
}
