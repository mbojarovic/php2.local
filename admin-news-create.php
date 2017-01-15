<?php

require __DIR__ . '/autoload.php';

if (isset($_POST['title']) && isset($_POST['text'])) {
    $title  = $_POST['title'];
    $text  = $_POST['text'];

    $article = new \App\Models\Article();
    $article->title = $title;
    $article->text = $text;
    $article->save();

    header('refresh: 2; url=/admin-news.php');

} else {
    $title = null;
    $text = null;
}

include __DIR__ . '/template/admin-news-create.php';