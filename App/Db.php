<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = new Config();
        $dsn = $config->data['db']['driver'] . ':host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'];
        $this->dbh = new \Pdo($dsn, $config->data['db']['username'], $config->data['db']['pass']);
    }

    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false === $res) {
            die('DB error in ' . $sql);
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function execute($sql, $data = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

}