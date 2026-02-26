<?php

namespace app\Models;

use app\Core\DbModel;

class User extends DbModel{
     public string $firstName = '';
     public string $lastName = '';
     public string $email = '';
     public string $password = '';
     public string $confirm_password = '';

     public function TableName(): string
     {
          return 'user';
     }
     public function register(){
         return $this->save();
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

     public function attributes(): array{
          return ['firstname','lastname','email','password'];
     }
}