<?php
require_once 'inc/config.php';
require('./helpers/helper.php');

$view = new View();

$route = isset($_GET['route']) ? $_GET['route'] : 'home';
$controllerName = ucfirst($route) . 'Controller';

if (class_exists($controllerName)) {
    $controller = new $controllerName($view);
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {

    }
} else {

}
