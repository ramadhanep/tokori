<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateID(array $data)
    {
        $lastID = $this->db->table($this->table)->selectMax('id')->get()->getRow()->id;
        if (!$lastID) {
            $newID = 'PYMT0001';
        } else {
            $number = intval(substr($lastID, 4)) + 1;
            $newID = 'PYMT' . str_pad($number, 4, '0', STR_PAD_LEFT);
        }
        $data['data']['id'] = $newID;

        return $data;
    }
}
