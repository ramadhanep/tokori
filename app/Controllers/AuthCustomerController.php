<?php

namespace App\Controllers;

use App\Models\ReservationTable;

class AuthCustomerController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view("pages/auth-customer/login");
    }

    public function login()
    {
        $reservationTableId = $this->request->getPost('reservation_table_id');
        $model = new ReservationTable();
        $reservationTable = $model->where('id', $reservationTableId)->first();

        if ($reservationTable) {
            $session = session();
            $session->set('SES_AUTH_CUSTOMER_TABLE', $reservationTable['id']);

            return redirect()->to('/order');
        } else {
            return redirect()->back()->with('error', 'Meja tidak ditemukan');
        }
    }

    public function loginAuto($reservationTableId)
    {
        $model = new ReservationTable();
        $reservationTable = $model->where('id', $reservationTableId)->first();

        if ($reservationTable) {
            $session = session();
            $session->set('SES_AUTH_CUSTOMER_TABLE', $reservationTable['id']);

            return redirect()->to('/order');
        } else {
            return redirect()->to('/order/login')->with('error', 'Meja tidak ditemukan');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('SES_AUTH_CUSTOMER_TABLE');

        return redirect()->to('/order/login');
    }
}
