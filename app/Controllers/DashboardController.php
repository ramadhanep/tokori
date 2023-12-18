<?php

namespace App\Controllers;

use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $profile = new User();
        $profile = $profile->find(session()->get('SES_AUTH_USER_ID'));
        
        $pass['profile'] = $profile;

        return view("pages/home", $pass);
    }
}
