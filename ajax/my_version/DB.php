<?php

class DB
{
    public $link;
    const host = '127.0.0.1';
    const user = 'root';
    const db_password = '';
    const db_name = 'ajax';

    public function __construct()
    {
        $this->link = new mysqli(self::host, self::user, self::db_password, self::db_name);
    }

    public function find($sql)
    {
        return $query = $this->link->query($sql);
    }

    public function insert($sql)
    {
        return $this->link->query($sql);
    }
}