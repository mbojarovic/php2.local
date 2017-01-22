<?php

require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI']);
var_dump($parts);
$controllerName = $parts[1] ?: 'Index';
$actionName = $parts[2] ?: 'Default';
$controllerClass = '\\App\\Controllers\\' . $controllerName;

if (!class_exists($controllerClass)) {
    die('Контроллер не найден');
}

$controller = new $controllerClass;
$controller->action($actionName);