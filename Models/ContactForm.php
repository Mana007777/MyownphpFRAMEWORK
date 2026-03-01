<?php

namespace app\Models;

use app\Core\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';

    public string $body = '';

    public function rules()
    {
      return [
        'subject' => [self::RULE_REQUIRED],
        'email'=> [self::RULE_REQUIRED , self::RULE_EMAIL],
        'body' => [self::RULE_REQUIRED],
      ];
    }

    public function label(): array
    {
        return [
         'subject' => 'Enter Your subject',
         'email' => 'Enter Your Email',
         'body' => 'Body'
        ];
    }
    public function send()
    {
      return true;
    }
}
