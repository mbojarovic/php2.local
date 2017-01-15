<?php

require __DIR__ . '/autoload.php';

class mySingleton
{
    public $time;

    public function __construct()
    {
        $this->time = microtime(true);
    }
}

$obj = new mySingleton();
echo $obj->time;

echo '<br>';
sleep(1);

$obj = new mySingleton();
echo $obj->time;