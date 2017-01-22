<?php

namespace App\Models;

use App\Model;

class Article
    extends Model
{

    /**
     * @var string Should contain a table name
     */

    public static $table = 'news';

    /**
     * @var
     */

    public $title;
    public $text;
    public $author_id;

    /**
     * @param $key
     * @return mixed
     */

    public function __get($key)
    {
        if ('author' == $key) {
            return Author::findOneById($this->author_id);
        }
    }

    /**
     * @param $key
     * @return bool
     */

    public function __isset($key)
    {
        if ('author' == $key && !empty($this->author_id)) {
            return true;
        }
    }
}