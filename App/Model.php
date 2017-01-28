<?php

namespace App;

abstract class Model
{

    public $id;

    public static function findAll()
    {
        $db = db::instance();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findOneById(int $id)
    {
        $db = db::instance();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, ['id' => $id], static::class);

        $result = [];

        foreach ($res as $value) {
            $result = $value;
        }
            return $result;
    }

    public static function findRecords(int $limit = 3, int $offset = 0)
    {
        $db = db::instance();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $offset . ', ' . $limit;
        return $res =  $db->query($sql, [], static::class);
    }

    public static function countAll()
    {
        $db = db::instance();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::$table;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    public function isNew()
    {
        return null === $this->id;
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return false;
        }
        $keys = [];
        $vals = [];
        $data = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $data[':' . $key] = $value;
            $keys[] = $key;
            $vals[] = ':' . $key;
        }
        $db = db::instance();
        $sql = 'INSERT INTO ' . static::$table . '
         (' . implode(',', $keys) . ')
         VALUES 
         (' . implode(',', $vals) . ')';
        $res = $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
        return $res;
    }

    //todo in future make method update, to update only this field, not all fields!!!
    public function update()
    {
        if ($this->isNew()) {
            return false;
        }
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }
        $db = db::instance();
        $sql = 'UPDATE ' . static::$table . ' 
        SET ' . implode(',', $sets) . ' 
        WHERE id=:id';
        return $db->execute($sql, $data);
    }

    public function delete()
    {
        if ($this->isNew()) {
            return false;
        }
        $db = db::instance();
        return $db->query('DELETE FROM ' .
            static::$table .
            ' WHERE id=:id',
            [':id' => $this->id]);
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function fill(array $data)
    {

    }
}