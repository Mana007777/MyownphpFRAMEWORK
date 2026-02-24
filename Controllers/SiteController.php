<?php

namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;

class SiteController extends Controller
{

    public function contact(){
        return $this->render('contact');
    }

    public function home(){
        $param = [
            'name' => 'Marllax'
        ];
        return $this->render('home', $param);
    }
    public function handleContact()
    {
        return 'Handling contact page';
    }
}