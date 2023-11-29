<?php

namespace App\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductUnit;
use App\Models\Product;

use Picqer\Barcode\BarcodeGeneratorPNG;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new Product();
        $products = $model->orderBy('created_at', 'DESC')->findAll();
        foreach ($products as $key => $item) {
            $generator = new BarcodeGeneratorPNG;
            $products[$key]['barcode'] = 'data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '';
        }
        $generator = new BarcodeGeneratorPNG();
        $pass = [
            'model' => $model,
            'products' => $products,
        ];

        return view('pages/product/index', $pass);
    }

    public function create()
    {
        $modelCategory = new ProductCategory();
        $modelUnit = new ProductUnit();
        $pass = [
            'productCategories' => $modelCategory->orderBy('id', 'ASC')->findAll(),
            'productUnits' => $modelUnit->orderBy('id', 'ASC')->findAll()
        ];

        return view('pages/product/create', $pass);
    }

    public function store()
    {
        $model = new Product();
        $data = [
            'product_category_id' => $this->request->getPost('form-product-category-id'),
            'product_unit_id' => $this->request->getPost('form-product-unit-id'),
            'code' => $this->request->getPost('form-code'),
            'name' => $this->request->getPost('form-name'),
            'price' => (int) str_replace(['Rp', '.', ','], '', $this->request->getPost('form-price')),
            'quantity' => $this->request->getPost('form-quantity'),
            'alert_quantity' => $this->request->getPost('form-alert-quantity'),
        ];

        $photo = $this->request->getFile('form-photo');
        if ($photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('./img/products', $photoName);
        }
        if (isset($photoName)) {
            $data['photo'] = $photoName;
        }

        $model->insert($data);

        return redirect()->to('master/products')->with('success', 'Product berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new Product();
        $modelCategory = new ProductCategory();
        $modelUnit = new ProductUnit();
        $pass = [
            'data' => $model->find($id),
            'productCategories' => $modelCategory->orderBy('id', 'ASC')->findAll(),
            'productUnits' => $modelUnit->orderBy('id', 'ASC')->findAll()
        ];

        return view('pages/product/edit', $pass);
    }

    public function update($id)
    {
        $model = new Product();
        $data = [
            'product_category_id' => $this->request->getPost('form-product-category-id'),
            'product_unit_id' => $this->request->getPost('form-product-unit-id'),
            'code' => $this->request->getPost('form-code'),
            'name' => $this->request->getPost('form-name'),
            'price' => (int) str_replace(['Rp', '.', ','], '', $this->request->getPost('form-price')),
            'quantity' => $this->request->getPost('form-quantity'),
            'alert_quantity' => $this->request->getPost('form-alert-quantity'),
        ];

        $photo = $this->request->getFile('form-photo');
        if ($photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('./img/products', $photoName);
        }
        if (isset($photoName)) {
            $data['photo'] = $photoName;
        }

        $model->update($id, $data);

        return redirect()->to('master/products')->with('success', 'Product berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new Product();
        $model->delete($id);

        return redirect()->to('master/products')->with('success', 'Product berhasil dihapus');
    }
}
