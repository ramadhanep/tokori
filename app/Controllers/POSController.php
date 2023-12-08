<?php

namespace App\Controllers;

use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\SaleProduct;
use App\Models\Setting;
use Config\Database;

class POSController extends BaseController
{
    public function index()
    {
        $paymentMethod = new PaymentMethod();
        $product = new Product();
        $setting = new Setting();

        $pass = [
            'paymentMethods' => $paymentMethod->orderBy('created_at', 'DESC')->findAll(),
            'products' => $product->orderBy('name', 'ASC')->findAll(),
            'ppn' => $setting->orderBy('id', 'ASC')->first()['sales_tax']
        ];

        return view("pages/pos/index", $pass);
    }

    public function ajaxProductCheck()
    {
        $productCode = $this->request->getGet('product-code');
        $productModel = new Product();
        $product = $productModel->where('code', $productCode)->first();
        $status = false;
        if ($product) {
            $status = true;
        }

        $this->response->setHeader('Content-Type', 'application/json');
        return $this->response->setJSON(array('status' => $status));
    }

    public function ajaxProductsList()
    {
        $productCodes = $this->request->getGet('product-codes');
        $products = array();
        if (is_array($productCodes) && count($productCodes) > 0) {
            $productModel = new Product();
            $productModel->whereIn('code', $productCodes);
            $products = $productModel->orderBy('name', 'ASC')->findAll();
            foreach ($products as $key => $item) {
                $products[$key]['product_category_name'] = $productModel->getCategory($item['product_category_id']);
            }
        }

        $this->response->setHeader('Content-Type', 'application/json');
        return $this->response->setJSON($products);
    }

    public function ajaxTransaction()
    {
        $generateSaleId = generateRandomString(10);
        $currentDateTime = date("Y-m-d H:i:s");

        // Insert data sales
        $saleData = [
            'id' => $generateSaleId,
            'payment_method_id' => $this->request->getPost('payment_method_id'),
            'customer_name' => $this->request->getPost('customer_name'),
            'total_sale_amount' => $this->request->getPost('total_sale_amount'),
            'tax_amount' => $this->request->getPost('tax_amount'),
            'total_amount' => $this->request->getPost('total_amount'),
            'pay_amount' => $this->request->getPost('pay_amount'),
            'payback_amount' => $this->request->getPost('payback_amount'),
            'status' => $this->request->getPost('status'),
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime
        ];
        $db = Database::connect();
        $db->table('sales')->insert($saleData);
        $db->close();

        // Insert data sales products
        $productLists = $this->request->getPost('product_lists');
        foreach ($productLists as $item) {
            $productModel = new Product();
            $product = $productModel->where('code', $item['code'])->first();
            if ($product) {
                $saleProduct = new SaleProduct();
                $saleProductData = [
                    'sales_id' => $generateSaleId,
                    'product_id' => $product['id'],
                    'quantity' => $item['quantity'],
                ];
                $saleProduct->insert($saleProductData);
            }
        }
        
        return $this->response->setJSON(array('status' => 'OK', 'sale' => $generateSaleId));
    }
}
