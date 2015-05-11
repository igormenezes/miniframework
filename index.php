<?php

require_once 'config.php';

if (in_array('', $arrayUrl)) {
    unset($arrayUrl[0]);
}

if (in_array(PROJECT, $arrayUrl)) {
    unset($arrayUrl[1]);
}

foreach ($arrayUrl as $val) {
    $url[] = $val;
}

if (count($url) === 1 && $url[0] === '') {
    $controller = 'index';
} elseif (count($url) === 1) {
    $controller = $url[0];
} elseif (count($url) === 2 && !is_numeric($url[1])) {
    $controller = $url[0];
    $action = $url[1];
} elseif (count($url) === 2 && is_numeric($url[1])) {
    $controller = $url[0];
    $param = $url[1];
} elseif (count($url) > 2) {
    $controller = $url[0];
    $action = $url[1];
    unset($url[0]);
    unset($url[1]);

    foreach ($url as $val) {
        $param[] = $val;
    }
}


$controller = !empty($controller) ? $controller : false;
$action = !empty($action) ? $action : false;
$param = !empty($param) ? $param : false;

if (!file_exists(CONTROLLER . $controller . '.php') && !file_exists(VIEW . $action . '.php')) {
    exit('<strong>404 ERRO</strong>');
}

$init = new Controller();
$init->init($controller, $action, $param);
