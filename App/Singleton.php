<?php

namespace App;

trait Singleton
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