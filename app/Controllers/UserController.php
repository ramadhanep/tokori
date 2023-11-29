<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User();
        $pass = [
            'model' => $model,
            'users' => $model->orderBy('updated_at', 'DESC')->findAll(),
        ];

        return view('pages/user/index', $pass);
    }

    public function create()
    {
        return view('pages/user/create');
    }

    public function store()
    {
        $model = new User();

        $email = $this->request->getPost('form-email');
        $password = $this->request->getPost('form-password');
        $passwordConfirm = $this->request->getPost('form-password-confirm');

        $checkEmail = $model->where('email', $email)->first();
        if ($checkEmail) {
            return redirect()->back()->with('error', 'Email sudah digunakan');
        }
        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sama');
        }

        $data = [
            'role' => $this->request->getPost('form-role'),
            'name' => $this->request->getPost('form-name'),
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'is_active' => $this->request->getPost('form-status'),
        ];

        $photo = $this->request->getFile('form-photo');
        if ($photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('./img/avatars', $photoName);
        }
        if (isset($photoName)) {
            $data['photo'] = $photoName;
        }

        $model->insert($data);

        return redirect()->to('users')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new User();
        $pass = [
            'data' => $model->find($id)
        ];

        return view('pages/user/edit', $pass);
    }

    public function update($id)
    {
        $model = new User();
        $data = [
            'role' => $this->request->getPost('form-role'),
            'name' => $this->request->getPost('form-name'),
            'email' => $this->request->getPost('form-email'),
            'is_active' => $this->request->getPost('form-status'),
        ];

        $photo = $this->request->getFile('form-photo');
        if ($photo->isValid()) {
            $photoName = $photo->getRandomName();
            $photo->move('./img/avatars', $photoName);
        }
        if (isset($photoName)) {
            $data['photo'] = $photoName;
        }

        $model->update($id, $data);

        return redirect()->to('users')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function updatePassword($id)
    {
        $model = new User();
        $password = $this->request->getPost('password');
        $data = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $model->update($id, $data);

        return redirect()->to('users')->with('success', 'Password berhasil diubah');
    }

    public function delete($id)
    {
        $model = new User();
        $model->delete($id);

        return redirect()->to('users')->with('success', 'Pengguna berhasil dihapus');
    }
}
