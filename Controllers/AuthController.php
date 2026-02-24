<?php

namespace App\Controllers;

use app\Core\Controller;
use app\Core\Request;
use app\Models\registerModel;
class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $errors = [];
        if ($request->isPOST()) {
            $registerModel = new registerModel();

            $firstName = $request->getBody()['firstName'] ?? '';
            if (!$firstName) {
                $errors['firstName'] = 'First name is required';
             }
         return 'Form submitted';   
        }
        $this->setLayout('auth');

        return $this->render('register');
    }
}