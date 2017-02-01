<?php

namespace App\Models;

use App\Model;
use App\MultiException;

class Article
    extends Model
{

    /**
     * Class Article
     * @package App\Models
     * @property \App\Models\Author $author
     */
    public static $table = 'news';

    public $title;
    public $text;
    public $author_id;

//todo for if rules
    protected function validateTitle($value) {

        if (strlen($value) <= 3) {
            return false;
        } else {
            return true;
        }
    }

    protected function validateText($value) {

        if (strlen($value) <= 3) {
            return false;
            //throw new \Exception('validate text plzz');
        } else {
            return true;
        }
    }

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