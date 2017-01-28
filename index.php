<?php

require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI'] . '/');
//var_dump($parts);
$controllerName = ucfirst($parts[1]) ?: 'News';

if ($parts[1] == 'admin') {
    $controllerClassName = '\\App\\Controllers\\Admin\\' . $controllerName;
    $actionName = ucfirst($parts[2]) ?: 'All';
} else {
    $controllerClassName = '\\App\\Controllers\\' . $controllerName;
    $actionName = ucfirst($parts[2]) ?: 'All';
}

if (!class_exists($controllerClassName)) {
    die('Class ERROR 404');
}

if (!method_exists($controllerClassName, 'action' . $actionName)) {
    die('Action ERROR 404');
}

//todo придумать свой роутинг

try  {
    $controller = new $controllerClassName;
    $controller->action($actionName);

} catch (\App\Exceptions\DbException $e) {
    $view = new \App\View();
    $view->errors = $e->getMessage();
        echo $view->render(__DIR__ . '/App/Templates/error.php');

} catch (\App\Exceptions\Error404Exception $e) {
    $view = new \App\View();
    $view->errors = $e->getMessage();
    echo $view->render(__DIR__ . '/App/Templates/error404.php');
}


























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