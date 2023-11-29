<?php

namespace App\Controllers;

use App\Models\PaymentMethod;

class PaymentMethodController extends BaseController
{
    public function index()
    {
        $model = new PaymentMethod();
        $pass = [
            'paymentMethods' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view("pages/payment-method/index", $pass);
    }

    public function store()
    {
        $model = new PaymentMethod();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->insert($data);

        return redirect()->to('master/payment-methods')->with('success', 'Metode Pembayaran berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new PaymentMethod();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);

        return redirect()->to('master/payment-methods')->with('success', 'Metode Pembayaran berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new PaymentMethod();
        $model->delete($id);

        return redirect()->to('master/payment-methods')->with('success', 'Metode Pembayaran berhasil dihapus');
    }
}
