<?php

/**
 * Created by PhpStorm.
 * User: osman.ramazanov
 * Date: 13.06.2017
 * Time: 20:09
 */
interface IIdentity
{
    public function login();
    public function logout();
    public function delete();
    public function add();
    public function update();
}