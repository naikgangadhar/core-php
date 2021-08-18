<?php

namespace Middlewares;

use Controllers\Login;

class AuthMiddleware
{
    public function validateLogin()
    {
        session_start();
        if ((empty($_SESSION) || empty($_SESSION["user_id"])) && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $Login = new Login();
            require $Login->loginPage();
            break;
        }
    }
}
