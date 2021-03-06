<?php

namespace App;

use App\Exceptions\DbException;

class Db
{
    use TSingleton;

    protected $dbh;

    public function __construct()
    {
        $config = Config::instance();
        $dsn = $config->data['db']['driver'] . ':host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'];
        try {
            $this->dbh = new \Pdo($dsn, $config->data['db']['username'], $config->data['db']['pass']);
        } catch (\PDOException $e) {
            throw new DbException($e->getMessage());

        }
    }

    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false === $res) {
            throw new DbException('DB error in ' . $sql);
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

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}