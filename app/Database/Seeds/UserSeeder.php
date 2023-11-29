<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$datas = [
			[
				'id'         => generateRandomString(10),
				'role'       => 'Manajer',
				'name'       => 'Ramadhan',
				'email'      => 'ramadhan@tokori.id',
				'photo'      => null,
				'is_active'  => true,
				'password'   => password_hash('Admin123!', PASSWORD_DEFAULT),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			],
			[
				'id'         => generateRandomString(10),
				'role'       => 'Kasir',
				'name'       => 'Fiqri',
				'email'      => 'fiqri@tokori.id',
				'photo'      => null,
				'is_active'  => true,
				'password'   => password_hash('Admin123!', PASSWORD_DEFAULT),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			],
		];
		$this->db->table('users')->insertBatch($datas);
	}
}
