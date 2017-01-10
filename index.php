<?php
require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findRecords();

include __DIR__ . '/template/index.php';