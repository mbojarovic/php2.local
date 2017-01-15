<?php

namespace App;

abstract class Model
{

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findOneById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        return $db->query($sql,
            ['id' => $id], static::class)[0];
    }

    public static function findRecords(int $limit = 3, int $offset = 0)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $offset . ', ' . $limit;
        return $db->query($sql, [], static::class);
    }

    public static function countAll()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::$table;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    public function create()
    {
        $sets = [];
        $sets1 = [];
        $data = [];
        foreach ($this as $key => $value) {
           if ('id' == $key) {
                continue;
            }
            $sets[] =  ':' . $key;
            $sets1[] =  $key;
            $data[':' . $key] = $value;
        }
        $db = new Db();
        $sql = 'INSERT INTO ' . static::$table . '
        (' . implode(',', $sets1) . ')' . ' 
        VALUES ' . '(' .implode(',', $sets) . ')';
        return $db->execute($sql, $data);
    }

    //todo in future make method update, to update only this field, not all fields!!!
    public function update()
    {
        $sets = [];
        $data = [];
        foreach ($this as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }
        $db = new Db();
        $sql = 'UPDATE ' . static::$table . ' 
        SET ' . implode(',', $sets) . ' 
        WHERE id=:id';
        return $db->execute($sql, $data);
    }

    public function save()
    {
        if ($this->id === null) {
            self::create();
        } else {
            self::update();
        }
    }

    public function delete()
    {
        $db = new Db();
        return $db->query('DELETE FROM ' .
            static::$table .
            ' WHERE id=:id',
            [':id' => $this->id]);
    }
}