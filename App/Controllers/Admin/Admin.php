<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;

class Admin
    extends Controller
{

    protected function beforeAction()
    {
    }

    protected function access(): bool
    {
        return true;
    }

    public function actionAll()
    {
        $this->view->news = Article::findAll();
        echo $this->view->render(
            __DIR__ . '/../../Templates/Admin/news.php'
        );
    }

    public function actionOne()
    {
        $this->view->article = Article::findOneById($_GET['id']);
    }

    public function actionCreate()
    {
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $title  = $_POST['title'];
            $text  = $_POST['text'];
            $author_id = $_POST['author_id'];

            $article = new \App\Models\Article();
            $article->title = $title;
            $article->text = $text;
            $article->author_id = $_POST['author_id'];
            $article->save();
            header('refresh: 2; url=/admin/');

        } else {
            $title = null;
            $text = null;
            $author_id = null;
        }

        $view = new \App\View();
        echo $view->render(__DIR__ . '/../../Templates/Admin/news-create.php');
    }

    public function actionUpdate()
    {
        if (isset($_GET['id'])) {
            $id  = $_GET['id'];
        } else {
            $id = null;
        }
        $view = new \App\View();
        $view->article = \App\Models\Article::findOneById($id);

        if (isset($_POST['title']) && isset($_POST['text'])) {
            $title  = $_POST['title'];
            $text  = $_POST['text'];
            $author_id = $_POST['author_id'];

            $view->article = new \App\View();
            $article = \App\Models\Article::findOneById($id);

            $article->title = $title;
            $article->text = $text;
            $article->author_id = $author_id;
            $article->save();

            header('refresh: 2; url=/admin/');

        } else {
            $title = null;
            $text = null;
        }

        echo $view->render(__DIR__ . '/../../Templates/Admin/news-update.php');
    }

    public function actionDelete()
    {
        if (isset($_GET['id'])) {
            $id  = $_GET['id'];
            $article = \App\Models\Article::findOneById($id);
            $article->delete();

            header('refresh: 2; url=/admin/');

            $view = new \App\View();
            echo $view->render(__DIR__ . '/../../Templates/Admin/news-delete.php');

        } else {
            $id = null;
        }
    }

}