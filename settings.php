<?php 
    if (!defined('ERROR_LOG')) define('ERROR_LOG', __DIR__ . '/error.log');
    ini_set("log_errors", TRUE);
    ini_set('error_log', ERROR_LOG);
?>