<?php

namespace App\Controllers;

use App\Models\ProductUnit;

class ProductUnitController extends BaseController
{
    public function index()
    {
        $model = new ProductUnit();
        $pass = [
            'productUnits' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view("pages/product-unit/index", $pass);
    }

    public function store()
    {
        $model = new ProductUnit();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->insert($data);

        return redirect()->to('master/product-units')->with('success', 'Unit Product berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new ProductUnit();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);

        return redirect()->to('master/product-units')->with('success', 'Unit Product berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new ProductUnit();
        $model->delete($id);

        return redirect()->to('master/product-units')->with('success', 'Unit Product berhasil dihapus');
    }
}
