<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view("pages/auth/login");
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new User();
        $user = $userModel->where('email', $email)->where('is_active', 1)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set('SES_AUTH_USER_ID', $user['id']);

            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Akun tidak ditemukan');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('SES_AUTH_USER_ID');

        return redirect()->to('/login');
    }
}
