<?php

namespace Middlewares;

use Controllers\Login;

class AuthMiddleware
{
    public function validateLogin()
    {
        if ((empty($_SESSION) || empty($_SESSION["user_id"])) &&
            $_SERVER['REQUEST_METHOD'] == 'GET' &&
            $_SERVER['REQUEST_URI'] != '/registration'
        ) {
            $Login = new Login();
            require $Login->loginPage();
            break;
        }
    }
}
