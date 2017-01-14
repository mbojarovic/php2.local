<?php
require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findAll();

include __DIR__ . '/template/index.php';