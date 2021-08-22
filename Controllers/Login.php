<?php

namespace Controllers;

use Models\User;
use Models\LoginDetail;

class Login
{

    public function loginPage()
    {
        session_start();
        if (!empty($_SESSION["user_id"])) {
            $home = new Home();
            return $home->showHomePage();
        }
        return  DOCUMENT_ROOT . '/views/login.php';
    }
    public function loginUser()
    {
        session_start();
        if (!empty($_SESSION["user_id"])) {
            header("Location: /home");
            $home = new Home();
            return $home->showHomePage();
        }
        $login = new LoginDetail();
        $user_data = toArray($login->getRows([], ['username' => $_POST['username']]));
        $password = array_get($user_data, "0.password");
        $user_id = array_get($user_data, "0.user_id");
        if (!password_verify($_POST['password'], $password))
            die('Invalid password.');

        $_SESSION["user_id"] =  $user_id;
        header("Location: /home");
        $home = new Home();
        return $home->showHomePage();
    }

    public function registerUser()
    {
        session_start();
        $user = new User();
        $login = new LoginDetail();
        $user_id = $user->insertRowGetID(['name' => $_POST['name'], 'contact_no' => $_POST['contact_no'], 'email' => $_POST['email']]);
        $login->insertRow(['user_id' => $user_id, 'username' => $_POST['username'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)]);
        $_SESSION["user_id"] = $user_id;
        header("Location: /home");
        $home = new Home();
        return $home->showHomePage();
    }
    public function registrationPage()
    {
        return  DOCUMENT_ROOT . '/views/registration.php';
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /home");
        return  DOCUMENT_ROOT . '/../views/login.php';
    }
}
