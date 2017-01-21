<?php

namespace App\Models;

use App\Model;

class Article
    extends Model
{

    public static $table = 'news';

    public $title;
    public $text;
    public $author_id;

    public function __get($key)
    {
        if ('author' == $key) {
            return Author::findOneById($this->author_id);
        }
    }

    public function __isset($key)
    {
        if ('author' == $key && !empty($this->author_id)) {
            return true;
        }
    }

}