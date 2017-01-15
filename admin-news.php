<?php

require __DIR__ . '/autoload.php';

$articles = \App\Models\Article::findAll();

include __DIR__ . '/template/admin-news.php';

