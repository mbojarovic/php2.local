<?php

require __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $article = \App\Models\Article::findOneById($id);
    $article->delete();
    header('refresh: 2; url=/admin-news.php');
    include __DIR__ . '/template/admin-news-delete.php';
} else {
    $id = null;
}