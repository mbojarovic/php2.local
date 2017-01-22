<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
} else {
    $id = null;
}
$view = new \App\View();
$view->article = \App\Models\Article::findOneById($id);

if (isset($_POST['title']) && isset($_POST['text'])) {
    $title  = $_POST['title'];
    $text  = $_POST['text'];
    $author_id = $_POST['author_id'];

    $view->article = new \App\View();
    $article = \App\Models\Article::findOneById($id);

    $article->title = $title;
    $article->text = $text;
    $article->author_id = $author_id;
    $article->save();

    header('refresh: 2; url=/admin-news.php');

} else {
    $title = null;
    $text = null;
}

echo $view->render(__DIR__ . '/Templates/admin-news-update.php');