<?php
require __DIR__ . '/autoload.php';

isset($_GET['id']) ? $id = $_GET['id'] : $id = null;

$data = \App\Models\Article::findOneById($id);

include __DIR__ . '/template/article.php';