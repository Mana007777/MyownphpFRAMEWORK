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
        throw new \Exception('Not implemented');
    }
}
