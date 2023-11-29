<?php

namespace App\Controllers;

use App\Models\ProductCategory;

class ProductCategoryController extends BaseController
{
    public function index()
    {
        $model = new ProductCategory();
        $pass = [
            'productCategories' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view("pages/product-category/index", $pass);
    }

    public function store()
    {
        $model = new ProductCategory();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->insert($data);

        return redirect()->to('master/product-categories')->with('success', 'Kategori Product berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new ProductCategory();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $model->update($id, $data);

        return redirect()->to('master/product-categories')->with('success', 'Kategori Product berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new ProductCategory();
        $model->delete($id);

        return redirect()->to('master/product-categories')->with('success', 'Kategori Product berhasil dihapus');
    }
}
