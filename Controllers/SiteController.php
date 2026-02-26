<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Request;

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
    public function handleContact(Request $request){
        $body = $request->getbody();
        return 'Handling contact page with body: ' . json_encode($body);
    }
}