<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller {

    public function index()
    {
        $posts = (new Post($this->getDb()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function destroy(int $id)
    {
        $post = new Post($this->getDb());
        $result = $post->destroy($id);

        if($result)
        {
            return header('location: /admin/posts');
        }
    }

}
