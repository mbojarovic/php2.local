<?php

require __DIR__ . '/../autoload.php';

$article = \App\Models\Article::findOneById(1);
var_dump($article);

assert( is_object($article) );
assert( $article instanceof \App\Models\Article);
assert('Троян Retefe атакует пользователей Facebook, Gmail и PayPal' == $article->title);