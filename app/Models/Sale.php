<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Sale extends Model
{
    protected $table = 'sales';
    protected $beforeInsert = ['generateID'];
    protected $allowedFields = ['payment_method_id', 'customer_name', 'total_sale_amount', 'tax_amount', 'total_amount', 'pay_amount', 'payback_amount', 'created_at', 'updated_at'];
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

    public function getPaymentMethod($paymentMethodId)
    {
        $db = Database::connect();
        $productModel = $db->table('payment_methods')->where('id', $paymentMethodId)->get();
        $db->close();
        $pm = $productModel->getRowArray();

        if ($pm) {
            return $pm['name'];
        }

        return null;
    }

    public function getSaleProducts($transactionId)
    {
        $db = Database::connect();
        $transactionMenuModel = $db->table('sale_products')->where('sales_id', $transactionId)->get();
        $db->close();
        $data = $transactionMenuModel->getResultArray();

        if ($data) {
            return $data;
        }

        return array(
            "id" => "",
            "sales_id" => "",
            "product_id" => "",
            "quantity" => 0,
        );
    }
}
