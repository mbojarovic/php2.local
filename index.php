<?php
require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findRecords(3);
//var_dump($data);
include __DIR__ . '/template/index.php';