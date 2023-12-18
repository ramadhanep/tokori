<?php

namespace App\Controllers;

use App\Models\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $profile = new User();
        $profile = $profile->find(session()->get('SES_AUTH_USER_ID'));

        $hour = date('H');
        $greeting = $this->greeting($hour);
        
        $pass['profile'] = $profile;
        $pass['greeting'] = $greeting;

        return view("pages/home", $pass);
    }

    private function greeting($hour)
    {
        if ($hour >= 0 && $hour < 12) {
            return 'Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            return 'Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            return 'Sore';
        } else {
            return 'Malam';
        }
    }
}
