<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('SettingSeeder');
        $this->call('UserSeeder');
        $this->call('ProductCategorySeeder');
        $this->call('ProductUnitSeeder');
        $this->call('PaymentMethodSeeder');
        $this->call('ProductSeeder');
    }
}
