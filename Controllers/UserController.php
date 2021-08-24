<?php

namespace Controllers;

use Models\User;
use Models\Post;


class UserController
{

    public function uploadPost()
    {
        if(empty($_POST['post']))
            return header("Location: /home ");
        $post = new Post();
        $post->insertRow(['user_id' => $_SESSION["user_id"], 'content' => $_POST['post']]);
        header("Location: /home ");
    }

}
