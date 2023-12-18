<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new Product();
        $productTotal = $productModel->countAllResults();

        $saleModel = new Sale();
        $saleTotal = $saleModel->where('created_at >=', date('Y-m-01'))
            ->where('created_at <=', date('Y-m-t'))
            ->countAllResults();
        $salesByCurrentMonth = $saleModel
            ->select('SUM(total_amount) as total')
            ->where('created_at >=', date('Y-m-01'))
            ->where('created_at <=', date('Y-m-t'))
            ->findAll();

        $currentYear = date('Y');
        $salesPerMonth = $saleModel
            ->select('MONTH(created_at) as month, SUM(total_amount) as total')
            ->where('YEAR(created_at)', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->findAll();

        $salesPerMonthArray = array_fill(1, 12, 0);
        foreach ($salesPerMonth as $row) {
            $month = $row['month'];
            $salesPerMonthArray[$month] = (float) $row['total'];
        }
        
        $pass['saleTotal'] = $saleTotal;
        $pass['salesPerMonthArray'] = array_values($salesPerMonthArray);
        $pass['salesByCurrentMonth'] = count($salesByCurrentMonth) > 0 ? $salesByCurrentMonth[0]['total'] : 0;
        $pass['productTotal'] = $productTotal;

        return view("pages/home", $pass);
    }
}
