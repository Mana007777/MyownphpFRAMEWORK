<?php

namespace App\Controllers;

use app\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function register()
    {
        return $this->render('register');
    }
}