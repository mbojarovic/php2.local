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
        $this->view->news = Article::findAll();
        echo $this->view->render(
            __DIR__ . '/../Templates/index.php'
        );
    }

    public function actionOne()
    {
        $this->view->article = Article::findOneById($_GET['id']);

        if (!empty($this->view->article)) {
            echo $this->view->render(__DIR__ . '/../Templates/article.php' );
        } else {
            throw new Error404Exception('Ошибка 404 - не найдено');
        }
    }
}