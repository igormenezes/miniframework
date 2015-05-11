<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

$arrayUrl = explode('/', $_SERVER['REQUEST_URI']);

$pdo = ['db' => 'test', 'host' => 'localhost', 'user' => 'root', 'pass' => ''];
global $pdo;

define('PROJECT', 'bairrodagente');
define('CONTROLLER', 'App\\Controller\\');

if (in_array('admin', $arrayUrl)) {
    define('VIEW', 'App/View/html/admin/');
} else {
    define('VIEW', 'App/View/html/');
}

spl_autoload_register('autoload');

function autoload($class)
{
    require_once(str_replace('\\', DIRECTORY_SEPARATOR, $class . '.php'));
}
