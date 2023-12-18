<?php

namespace App\Controllers;

use App\Models\Sale;
use CodeIgniter\I18n\Time;

class ReportController extends BaseController
{
    public function pointOfSale()
    {
        $saleModel = new Sale();
        $salesByDate = $saleModel
            ->select('DATE(created_at) as date, SUM(total_sale_amount) as total_sale, SUM(tax_amount) as total_tax, SUM(total_amount) as grand_total')
            ->groupBy('date')
            ->orderBy('date', 'DESC');

        $startDate = $this->request->getGet('filter-start-date');
        $endDate = $this->request->getGet('filter-end-date');

        if ($startDate) {
            $salesByDate->where('created_at >=', $startDate);
        } else {
            $salesByDate->where('created_at >=', date('Y-m-01'));
        }

        if ($endDate) {
            $salesByDate->where('created_at <=', $endDate);
        } else {
            $salesByDate->where('created_at <=', date('Y-m-t'));
        }

        $salesByDate = $salesByDate->findAll();

        $formattedSales = [];
        foreach ($salesByDate as $sale) {
            $formattedSales[] = [
                'date' => Time::createFromFormat('Y-m-d', $sale['date'])->toLocalizedString('d/M/Y'),
                'total_sale' => $sale['total_sale'],
                'total_tax' => $sale['total_tax'],
                'grand_total' => $sale['grand_total'],
            ];
        }

        $data = [
            'reports' => $formattedSales,
        ];

        return view('pages/report/point-of-sale', $data);
    }
}
