<?php

namespace Controllers;

class Login
{

    public function loginPage()
    {
        return  DOCUMENT_ROOT . '/views/login.php';
    }
    public function loginUser()
    {
        session_start();
        $_SESSION["user_id"] = 1;
        $user_id = 1;
        $home = new Home();
        return $home->showHomePage();
    }
}
