<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $article = \App\Models\Article::findOneById($id);
    $article->delete();

    header('refresh: 2; url=/admin-news.php');

    $view = new \App\View();
    echo $view->render(__DIR__ . '/Template/admin-news-delete.php');

} else {
    $id = null;
}