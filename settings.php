<?php
if (!defined('ERROR_LOG')) define('ERROR_LOG', __DIR__ . '/error.log');
ini_set("log_errors", TRUE);
ini_set('error_log', ERROR_LOG);
if (!defined('SERVERNAME')) define('SERVERNAME', "localhost");
if (!defined('USER')) define('USER', "root");
if (!defined('PASSWORD')) define('PASSWORD', "Mo0rd@831");
if (!defined('DBNAME')) define('DBNAME', "coredb");
