<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class SaleProduct extends Model
{
    protected $table = 'sale_products';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['sales_id', 'product_id', 'quantity', 'created_at', 'updated_at'];
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

    public function getProduct($productId)
    {
        $db = Database::connect();
        $productModel = $db->table('products')->where('id', $productId)->get();
        $db->close();
        $data = $productModel->getRowArray();

        if ($data) {
            return $data;
        }

        return array(
            "id" => "",
            "product_category_id" => "",
            "code" => "",
            "name" => "",
            "photo" => "",
            "price" => 0,
            "quantity" => 0,
        );
    }

    public function getProductCategory($productId)
    {
        $db = Database::connect();
        $productModel = $db->table('products')->where('id', $productId)->get();
        $data = $productModel->getRowArray();

        if ($data) {
            $productCategoryModel = $db->table('product_categories')->where('id', $data['product_category_id'])->get();
            $db->close();
            $dataCat = $productCategoryModel->getRowArray();

            return $dataCat;
        }

        return array(
            "id" => "",
            "name" => "",
        );
    }
}
