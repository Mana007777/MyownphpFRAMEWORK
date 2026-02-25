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

     public function rules(): array{
          return [
               "firstName" => [self::RULE_REQUIRED],
               "lastName" => [self::RULE_REQUIRED],
               "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
               "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
               "confirm_password" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]    
          ];
     }
}