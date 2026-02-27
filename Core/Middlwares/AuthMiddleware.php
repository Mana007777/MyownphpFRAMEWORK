<?php

namespace app\Core\Middlwares;

use app\Core\Application;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions;
    public function execute()
    {
        if(Application::isGuest())
            {
              
            }
    }
}