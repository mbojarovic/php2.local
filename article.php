<?php

require __DIR__ . '/autoload.php';

isset($_GET['id']) ? $id = $_GET['id'] : $id = null;

$view = new \App\View();

$view->article = \App\Models\Article::findOneById($id);

echo $view->render(__DIR__ . '/Template/article.php');