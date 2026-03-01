<?php

namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\Request;
use app\Core\Response;
use app\Models\ContactForm;

class SiteController extends Controller
{

    public function contact(Request $request , Response $response){
        $contact = new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getbody());
             if($contact->validate() && $contact->send()){
                Application::$app->session->set("Success","thanks for contacting us");
                return $response->redirect("/contact");
             }
        }
        return $this->render('contact' , ['model'=>$contact]);
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