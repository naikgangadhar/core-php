<?php

namespace Controllers;

use Models\User;
use Models\Post;


class Home
{

    public function showHomePage()
    {
        $user = new User();
        $post = new Post();
        $data['user_data'] = $user->getUser($_SESSION["user_id"]);
        $data['posts'] = $post->getPosts($_SESSION["user_id"]);
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
