<?php

use model\Post;

class PostController
{
    public function all()
    {
        $posts = Post::all();
        require_once 'view/posts/all.php';
    }

    public function showone()
    {
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }
        $post = Post::find($_GET['id']);
        require_once 'view/posts/single-post.php';
    }
}