<?php

namespace App\Models;

class LoggerText
{
    protected $text;

    function __construct($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getDate()
    {
        return $this->date . date("Y-m-d H:i:s");
    }
}