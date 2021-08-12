<?php
include __DIR__ . '/Controllers/Home.php';
include __DIR__ . '/settings.php';

try {
    $home = new Home();
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
        case '':
            require $home->showHomePage();
            break;
        case '/about':
            require $hom->showAboutPage();
            break;
        default:
            http_response_code(404);
            require $home->showErrorPage();
            break;
    }
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage());
}
