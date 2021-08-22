<?php

if (!defined('DOCUMENT_ROOT')) define('DOCUMENT_ROOT', __DIR__);
if (!defined('ERROR_LOG')) define('ERROR_LOG', __DIR__ . '/error.log');
ini_set("log_errors", TRUE);
ini_set('error_log', ERROR_LOG);
if (!defined('SERVERNAME')) define('SERVERNAME', "localhost");
if (!defined('USER')) define('USER', "root");
if (!defined('PASSWORD')) define('PASSWORD', "******");
if (!defined('DBNAME')) define('DBNAME', "coredb");

#autoloader for namespace and class
spl_autoload_register(function ($className) {

    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once DOCUMENT_ROOT . '/' . $className . '.php';
});

#Custom made laravel array_get method
function array_get($array = [], $needle, $default = null)
{
    try {
        if (empty($array) || empty($needle))
            error_log("Please check the parameters given to array_get");

        foreach (explode(".", $needle) as $key) {
            if (empty($array[$key])) return $default;
            $array =  $array[$key];
        }
        return !empty($array) ? $array : $default;
    } catch (Exception $e) {
        error_log("Exception: " . $e->getMessage());
    }
}

#Method to convert mysql object to array
function toArray($object)
{
    try {
        $data = [];
        if ($object->num_rows > 0) {
            while ($row = $object->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } catch (Exception $e) {
        error_log("Exception: " . $e->getMessage());
    }
}
