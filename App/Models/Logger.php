<?php

namespace App\Models;

class Logger
{
    protected $path;
    protected $logs = [];

    public function __construct($path)
    {
        $this->path = $path;
        $logs = file($this->path, FILE_IGNORE_NEW_LINES);
        foreach ($logs as $log) {
            //var_dump($log);
            $this->logs[] = new LoggerText($log);
        }
    }

    public function allLogs()
    {
        return $this->logs;
    }

    public function append(LoggerText $log)
    {
        $this->logs[] = $log;
    }

    public function save($url)
    {
        $arr = [];
        foreach ($this->logs as $value) {
            $arr[] = $value->getText();
        }

        $str = implode("\n", $arr);
        $str .= '---' . date("Y-m-d H:i:s");
        $str .= '---' . $url;

        file_put_contents($this->path, $str) ;
    }
}