<?php

namespace App;

trait TSingleton
{
    public static function instance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }
}