<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\Sale;
use App\Models\SaleProduct;

class POSManageController extends BaseController
{
    public function index()
    {
        $sale = new Sale();

        $pass = [
            'model' => $sale,
            'sales' => $sale->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view("pages/pos-manage/index", $pass);
    }

    public function show($id)
    {
        $sale = new Sale();
        $salefind = $sale->find($id);
        
        if ($salefind) {
            $saleProduct = new SaleProduct();
            $pass = [
                'model' => $sale,
                'modelSaleProduct' => $saleProduct,
                'sale' => $salefind,
            ];
    
            return view("pages/pos-manage/show", $pass);
        }

        $message = 'Data transaksi tidak dapat ditemukan.';
        throw new PageNotFoundException($message);
    }
}
