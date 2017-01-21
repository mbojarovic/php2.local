<?php

require __DIR__ . '/autoload.php';

if (isset($_POST['title']) && isset($_POST['text'])) {
    $title  = $_POST['title'];
    $text  = $_POST['text'];
    //$author_id = $_POST['author_id'];

    $article = new \App\Models\Article();
    $article->title = $title;
    $article->text = $text;
    //$author_id = $_POST['author_id'];
    $article->save();

    header('refresh: 2; url=/admin-news.php');

} else {
    $title = null;
    $text = null;
    $author_id = null;
}

$view = new \App\View();
echo $view->render(__DIR__ . '/Template/admin-news-create.php');

