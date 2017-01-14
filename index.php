<?php
require __DIR__ . '/autoload.php';

$data = \App\Models\Article::findRecords();

$ordering = new \App\Ordering();
$ordering->order(new \App\Models\Fruit());

include __DIR__ . '/template/index.php';