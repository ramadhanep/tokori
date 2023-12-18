<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Product extends Model
{
    protected $table = 'products';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['product_category_id', 'product_unit_id', 'code', 'name', 'photo', 'price', 'quantity', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected function generateID(array $data)
    {
        $lastID = $this->db->table($this->table)->selectMax('id')->get()->getRow()->id;
        if (!$lastID) {
            $newID = 'P000000001';
        } else {
            $number = intval(substr($lastID, 4)) + 1;
            $newID = 'P000' . str_pad($number, 6, '0', STR_PAD_LEFT);
        }
        $data['data']['id'] = $newID;

        return $data;
    }

    public function getCategory($productCategoryId)
    {
        $db = Database::connect();
        $productModel = $db->table('product_categories')->where('id', $productCategoryId)->get();
        $db->close();
        $category = $productModel->getRowArray();

        if ($category) {
            return $category['name'];
        }

        return null;
    }

    public function getUnit($productUnitId)
    {
        $db = Database::connect();
        $productModel = $db->table('product_units')->where('id', $productUnitId)->get();
        $db->close();
        $category = $productModel->getRowArray();

        if ($category) {
            return $category['name'];
        }

        return null;
    }
}
