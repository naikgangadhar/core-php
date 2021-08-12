<?php

class Home
{

    public function showHomePage()
    {
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
