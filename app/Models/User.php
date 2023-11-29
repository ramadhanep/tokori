<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $table = 'users';
	protected $beforeInsert = ['generateID'];
	protected $allowedFields = ['role', 'name', 'email', 'photo', 'is_active', 'password', 'created_at', 'updated_at'];
	protected $useTimestamps = true;
	protected $useSoftDeletes = true;
	protected $deletedField = 'deleted_at';

	protected function generateID(array $data)
	{
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$randomString = '';
		$charactersLength = strlen($characters);
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		$data['data']['id'] = $randomString;
		return $data;
	}
}
