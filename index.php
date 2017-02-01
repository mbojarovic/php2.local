<?php

use \App\Models\Logger;
use \App\Models\LoggerText;
require __DIR__ . '/autoload.php';

$parts = explode('/', $_SERVER['REQUEST_URI'] . '/');
$controllerName = ucfirst($parts[1]) ?: 'News';
    if ($parts[1] == 'admin') {
        $controllerClassName = '\\App\\Controllers\\Admin\\' . $controllerName;
        $actionName = ucfirst($parts[2]) ?: 'All';
    } else {
        $controllerClassName = '\\App\\Controllers\\' . $controllerName;
        $actionName = ucfirst($parts[2]) ?: 'All';
    }


//todo придумать свой роутинг

try  {
    if (!class_exists($controllerClassName)) {
        throw new \App\Exceptions\Error404Exception('Ошибка 404 - class не найден');
    }

    if (!method_exists($controllerClassName, 'action' . $actionName)) {
        throw new \App\Exceptions\Error404Exception('Ошибка 404 - method не найден');
    }

    $controller = new $controllerClassName;
    $controller->action($actionName);

} catch (\App\Exceptions\DbException $e) {
    $view = new \App\View();
    $view->errors = $e->getMessage();
        echo $view->render(__DIR__ . '/App/Templates/dberror.php');

} catch (\App\Exceptions\Error404Exception $e) {
    $view = new \App\View();
    $view->errors = $e->getMessage();
    echo $view->render(__DIR__ . '/App/Templates/404error.php');

} finally {
    if (isset($e)) {
        $log = new Logger(__DIR__ . '/log.txt');
        $loggertext = new LoggerText($e->getMessage());
        $log->append($loggertext);
        $log->save($_SERVER['REQUEST_URI']);
    }
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