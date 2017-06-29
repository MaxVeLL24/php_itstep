<?php

class page
{
    static public function getPage($id)
    {
        $page = DB::getInstance()->query("SELECT* FROM `page` WHERE `id`='$id'")->fetch_assoc();
        return ($page || $page->num_rows) ? $page : false;
    }

    static public function getTitle($id)
    {
       return self::getPage($id)['title'];
    }

    static public function getContent($id)
    {
        return self::getPage($id)['content'];
    }

    static public function getCreated($id)
    {
        return self::getPage($id)['created_at'];
    }
}