<?php

namespace app\Models;

use app\Core\Application;
use app\Core\Model;

class LoginForm extends Model{

  public string $email = '';
  public string $password = '';
  public function rules()
  {
    return [
        'email' =>[self::RULE_REQUIRED,self::RULE_EMAIL],
        'password'=>[self::RULE_REQUIRED]
    ];
  }

  public function login(){

    $user = User::findOne(['email'=> $this->email]);

    if(!$user){
        $this->ErrorMesg('email','User does not exist with this email');
        return false;
    }

    if(password_verify($this->password, $user->password)){
        $this->ErrorMesg('password','password is  incorrect');
        return false;
    }

    return Application::$app->login($user);
  }

  public function label(): array
  {
    return [
      'email'=>'Your email',
      'password'=>'Password'
    ];
  }


}