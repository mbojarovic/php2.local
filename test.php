<?php

require __DIR__ . '/autoload.php';

$loader = new Twig_Loader_Filesystem('App/Templates');
$twig = new Twig_Environment($loader, array());

echo $twig->render('index.php', array(\App\Models\Article::findAll()));




/*try {
    $article = new \App\Models\Article();
    $article->fill(['title' => 12, 'text' => '']);
    $article->save();
} catch (\App\MultiException $errors) {
    foreach ($errors as $error) {
        echo $error->getMessage();
    }
}*/







































/*$article = \App\Models\Article::findOneById(1);

assert( is_object($article) );
assert( $article instanceof \App\Models\Article);
assert('СМИ показали новую «первую леди» Белоруссии' == $article->title);*/

/*function checkPassword($password): bool
{
    $errors = new \App\MultiException();

    if (empty($password)) {
        $errors->add(new Exception('Пустой пароль'));
        throw $errors;
    }
    if (strlen($password) < 6) {
        $errors->add(new Exception('Слишком короткий пароль'));
    }
    if (!preg_match('~\d~', $password)) {
        $errors->add(new Exception('Нет цифры'));
    }
    if (!$errors->isEmpty()) {
        throw $errors;
    }
    return true;
}
try {
    //try i catch gdeto v controllere
    checkPassword('');
} catch (\App\MultiException $errors) {
    //$this->view = $errors;
    foreach ($errors as $error) {
        echo $error->getMessage();
    }
}*/