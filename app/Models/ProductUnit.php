<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductUnit extends Model
{
    protected $table = 'product_units';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateID(array $data)
    {
        $lastID = $this->db->table($this->table)->selectMax('id')->get()->getRow()->id;
        if (!$lastID) {
            $newID = 'PU00000001';
        } else {
            $number = intval(substr($lastID, 6)) + 1;
            $newID = 'PU0000' . str_pad($number, 4, '0', STR_PAD_LEFT);
        }
        $data['data']['id'] = $newID;

        return $data;
    }
}
