<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['company_name', 'company_logo', 'sales_tax', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateID(array $data)
    {
        $lastID = $this->db->table($this->table)->selectMax('id')->get()->getRow()->id;
        if (!$lastID) {
            $newID = 'ST00000001';
        } else {
            $number = intval(substr($lastID, 6)) + 1;
            $newID = 'ST0000' . str_pad($number, 4, '0', STR_PAD_LEFT);
        }
        $data['data']['id'] = $newID;

        return $data;
    }
}
