<?php

namespace App\Controllers;

use app\Core\Application;
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
        $user = new User();

        if ($request->isPOST()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->response->redirect('/');
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');

        return $this->render('register', [
            'model' => $user
        ]);
    }
}
