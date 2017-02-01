<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\Exceptions\Error404Exception;

class News
    extends Controller
{

    protected function beforeAction()
    {
    }

    protected function access():bool
    {
        return true;
    }

    public function actionAll()
    {
     $timer = new \PHP_Timer();
        \PHP_Timer::start();
        $timer->start();

        $loader = new \Twig_Loader_Filesystem('App/Templates');
        $twig = new \Twig_Environment($loader, array());
        echo $twig->render('index.php', array(
            'article' => Article::findAll(),
            'timer' => \PHP_Timer::resourceUsage(),
        ));
        $time = \PHP_Timer::stop();
    }

    public function actionOne()
    {
        $this->view->article = Article::findOneById($_GET['id']);

        if (false === empty($this->view->article)) {
            echo $this->view->render(__DIR__ . '/../Templates/article.php' );
        } else {
            throw new Error404Exception('Ошибка 404 - не найдено');
        }
    }
}