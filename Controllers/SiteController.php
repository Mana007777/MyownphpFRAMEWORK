<?php

namespace app\Controllers;

use app\Core\Application;

class SiteController
{

    public function contact(){
        return Application::$app->router->renderView('contact');
    }

    public function home(){
        $param = [
            'name' => 'Marllax'
        ];
        return Application::$app->router->renderView('home', $param);
    }
    public function handleContact()
    {
        return 'Handling contact page';
    }
}