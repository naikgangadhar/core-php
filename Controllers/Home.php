<?php

namespace Controllers;

use Models\User;


class Home
{

    public function showHomePage()
    {
        $obj = new User();
        $data = $obj->getUsers();
        $_GET['data'] = $data;
        return  __DIR__ . '/../views/index.php';
    }

    public function showAboutPage()
    {
        return  __DIR__ . '/../views/about.php';
    }

    public function showErrorPage()
    {
        return  __DIR__ . '/../views/404.php';
    }
}
