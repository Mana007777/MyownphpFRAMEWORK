<?php

namespace App\Controllers;

use app\Core\Controller;
use app\Core\Request;
use app\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new User();

        if ($request->isPOST()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');

        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}
