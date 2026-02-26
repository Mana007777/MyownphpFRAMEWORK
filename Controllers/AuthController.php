<?php

namespace App\Controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\Request;
use app\Core\Response;
use app\Models\LoginForm;
use app\Models\User;

class AuthController extends Controller
{
    public function login(Request $request , Response $response)
    {
        $loginForm = new LoginForm();

         if($request->isPost()){
            $loginForm->loadData($request->getbody());
             if($loginForm->validate() && $loginForm->login()){
               $response->redirect('/');
               return;
             }

        $this->setLayout('auth');
        return $this->render('login',['model'=>$loginForm]);
    }
    }
    public function register(Request $request)
    {
        $user = new User();

        if ($request->isPOST()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success','Thanks for Registering');
                Application::$app->response->redirect('/');
                exit;
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
