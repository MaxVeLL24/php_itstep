<?php

/**
 * Created by PhpStorm.
 * User: osman.ramazanov
 * Date: 13.06.2017
 * Time: 19:50
 */
class MySQLDb extends DB {
    public function open(){
    }

    public function close(){
        parent::connect();
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function queryAll()
    {
        // TODO: Implement queryAll() method.
    }
}