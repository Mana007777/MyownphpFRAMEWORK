<?php

namespace app\Models;

use app\Core\DbModel;
use app\Core\UserModel;

class User extends UserModel{
     public string $firstName = '';
     public string $lastName = '';
     public string $email = '';
     public string $password = '';
     public string $confirm_password = '';

     public static function TableName(): string
     {
          return 'users';
     }
     public function primaryKey(): string
     {
          return 'id';
     }
     public function save(){
          $this->password = password_hash($this->password, PASSWORD_DEFAULT);
         return parent::save();
     }
     

     public function rules(): array{
          return [
               "firstName" => [self::RULE_REQUIRED],
               "lastName" => [self::RULE_REQUIRED],
               "email" => [self::RULE_REQUIRED, self::RULE_EMAIL , [self::RULE_UNIQUE , 'class'=>self::class]],
               "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
               "confirm_password" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]    
          ];
     }

     public function attributes(): array{
          return ['firstname','lastname','email','password'];
     }
     public function label(): array
     {
        return [
          'firstname'=>"First Name",
          'lastname'=>"Last Name",
          'email'=>"Email",
          "password"=> "Password",
          'confirm_password'=> "Password Confirmation"
        ];
     }

     public function getDisplayName(): string
     {
          return $this->firstName. ' '.$this->lastName;
     } 
}