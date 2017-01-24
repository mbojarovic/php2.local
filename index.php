<?php

require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI'] . '/');
var_dump($parts);
//var_dump($parts);

$controllerName = ucfirst($parts[1]) ?: 'News';
//echo $controllerName;
$controllerClassName = '\\App\\Controllers\\' . $controllerName;

if (!class_exists($controllerClassName)) {
    die('Class ERROR 404');
}

$actionName = ucfirst($parts[2]) ?: 'All';
//echo $actionName;

if (!method_exists($controllerClassName, 'action' . $actionName)) {
    die('Action ERROR 404');
}
//todo придумать свой роутинг
$controller = new $controllerClassName;
$controller->action($actionName);

//old code. DO NOT READ!
/*$controllerName = $_GET['ctrl'] ?? 'News';

$controllerClassName = '\\App\\Controllers\\' . $controllerName;

if (!class_exists($controllerClassName)) {
    die('Class ERROR 404');
}

$actionName = $_GET['action'] ?? 'All';

if (!method_exists($controllerClassName, 'action' . $actionName)) {
    die('Action ERROR 404');
}

$controller = new $controllerClassName;
$controller->action($actionName);*/