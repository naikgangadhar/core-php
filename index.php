<?php

include __DIR__ . '/settings.php';
include __DIR__ . '/Routes.php';

use Controllers\Home;
use Middlewares\AuthMiddleware;

try {
    $method = array_get(ROUTES, $_SERVER['REQUEST_URI'] . "." . $_SERVER['REQUEST_METHOD']);
    $method = explode("@", $method);
    session_start();
    if (!empty($method[0]) && !empty($method[1])) {
        $auth = new AuthMiddleware();
        $auth->validateLogin();
        $class = "Controllers" . '\\' . $method[0];
        $class = new $class();
        require $class->$method[1]();
    } else {
        $home = new Home();
        http_response_code(404);
        require $home->showErrorPage();
    }
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage());
}
