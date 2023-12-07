<?php

namespace App\Controllers;

use App\Models\PaymentMethod;

class POSController extends BaseController
{
    public function index()
    {
        $paymentMethod = new PaymentMethod();

        $pass = [
            'paymentMethods' => $paymentMethod->orderBy('created_at', 'DESC')->findAll()
        ];

        return view("pages/pos/index", $pass);
    }
}
