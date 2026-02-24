<?php

namespace app\Controllers;

use app\Core\Application;

class SiteController
{

    public function contact(){
        return Application::$app->router->renderView('contact');
    }
    public function handleContact()
    {
        return 'Handling contact page';
    }
}