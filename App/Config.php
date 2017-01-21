<?php

namespace App;

class Config
{
    use TSingleton;

    public $data;

    private function __construct()
    {
        $this->data = include(__DIR__ . '/../config.php');
    }
}