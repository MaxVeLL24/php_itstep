<?php
namespace model;
class Post
{
    public $id;
    public $title;
    public $author;
    public $content;
    public $created_at;


    public function __construct($id, $title, $author, $content, $created_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
        $this->created_at = $created_at;
    }

    static public function all()
    {
        $db = \DB::getInstance();
        $posts = $db->query("SELECT * FROM `posts`")->fetchAll();
        $list=[];
        foreach ($posts as $post){
            $list[]=new Post($post['id'],$post['title'],$post['author'],$post['content'],$post['created_at']);
        }
        return $list;
//        if ($posts === false) {
//
//        }

    }

    static public function find()
    {

    }
}