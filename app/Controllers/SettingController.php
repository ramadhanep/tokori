<?php

namespace App\Controllers;

use App\Models\Setting;

class SettingController extends BaseController
{
    private $id = "ST00000001";
    public function index()
    {
        $setting = new Setting();
        $setting = $setting->find($this->id);

        $pass['setting'] = $setting;

        return view("pages/setting/index", $pass);
    }

    public function save()
    {
        $model = new Setting();

        $data = [
            'company_name' => $this->request->getPost('form-company-name'),
            'sales_tax' => $this->request->getPost('form-sales-tax'),
        ];

        $company_logo = $this->request->getFile('form-company-logo');
        if ($company_logo->isValid()) {
            $company_logo_name = $company_logo->getRandomName();
            $company_logo->move('./img/companies', $company_logo_name);
        }

        if (isset($company_logo_name)) {
            $data['company_logo'] = $company_logo_name;
        }

        $model->update($this->id, $data);

        return redirect()->to('settings')->with('success', 'Pengaturan berhasil diperbarui');
    }
}
