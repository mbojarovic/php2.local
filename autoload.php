<?php

function __autoload($className)
{
    $filename = str_replace('\\', '/', $className) . '.php';
    if (file_exists($filename)) {
        $path =  __DIR__ . '/' . $filename;
        require $path;
    }
}