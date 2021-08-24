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
        return  view('index.php');
    }

    public function showAboutPage()
    {
        return  view('about.php');
    }

    public function showErrorPage()
    {
        return  view('404.php');
    }
}
