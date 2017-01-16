<?php

namespace App;

class Config
{
    use Singleton;

    public $data;

    private function __construct()
    {
        $this->data = include(__DIR__ . '/../config.php');
    }
}