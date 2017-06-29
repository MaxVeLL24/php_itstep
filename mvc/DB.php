<?php

class DB
{
    static public function getInstance()
    {
        return new mysqli('localhost', 'root', '', 'pages');
    }
}