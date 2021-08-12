<?php
include __DIR__ . '/Controllers/Home.php';
include __DIR__ . '/settings.php';
$home = new Home();
try{
    $request = $_SERVER['REQUEST_URI'];
        switch ($request) {
            case '/' :
            case '' :
                require $home->showHomePage();
                break;
            case '/about' :
                require $hom->showAboutPage();
                break;
            default:
                http_response_code(404);
                require $home->showErrorPage();
                break;
        }
}catch(Exception $e){
    error_log("Exception Message: ".$e->getMessage(), 3, $log_file);
}
?>