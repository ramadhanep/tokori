<?php

namespace App\Controllers;

use App\Models\Supplier;

class SupplierController extends BaseController
{
    public function index()
    {
        $model = new Supplier();
        $pass = [
            'suppliers' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view("pages/supplier/index", $pass);
    }

    public function store()
    {
        $model = new Supplier();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ];

        $model->insert($data);

        return redirect()->to('master/suppliers')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new Supplier();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ];

        $model->update($id, $data);

        return redirect()->to('master/suppliers')->with('success', 'Supplier berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new Supplier();
        $model->delete($id);

        return redirect()->to('master/suppliers')->with('success', 'Supplier berhasil dihapus');
    }
}
