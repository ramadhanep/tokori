<?php

namespace App\Controllers;

use App\Models\User;

class ProfileController extends BaseController
{
    public function index()
    {
        $profile = new User();
        $profile = $profile->find(session()->get('SES_AUTH_USER_ID'));

        $pass['profile'] = $profile;

        return view("pages/profile/index", $pass);
    }

    public function save()
    {
        $id = session()->get('SES_AUTH_USER_ID');
        $model = new User();

        $data = [
            'name' => $this->request->getPost('form-name')
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

        return redirect()->to('profile')->with('success', 'Profile berhasil diperbarui');
    }

    public function changePassword()
    {
        $id = session()->get('SES_AUTH_USER_ID');
        $model = new User();

        $oldPassword = $this->request->getPost('form-old-password');
        $newPassword = $this->request->getPost('form-new-password');
        $newPasswordConfirm = $this->request->getPost('form-new-password-confirm');

        $user = $model->find($id);
        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->to('profile')->with('error', 'Password lama salah');
        }
        if ($newPassword !== $newPasswordConfirm) {
            return redirect()->to('profile')->with('error', 'Konfirmasi password tidak sama');
        }
        
        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];
        $model->update($id, $data);

        return redirect()->to('profile')->with('success', 'Password berhasil diperbarui');
    }
}
