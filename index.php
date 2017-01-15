<?php

require __DIR__ . '/autoload.php';

$article = \App\Models\Article::findAll();
$article1 = new \App\Models\Article();
$article1->title = 'newnewnew';
$article1->text = 'newnewnew1111111';
$article1->save();

include __DIR__ . '/template/index.php';