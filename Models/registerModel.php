<?php

namespace app\Models;

use app\Core\Model;

class registerModel extends Model{
     public string $firstName = '';
     public string $lastName = '';
     public string $email = '';
     public string $password = '';
     public string $confirm_password = '';

     public function register(){
          return "JUST CREATING A USER";
     }
}