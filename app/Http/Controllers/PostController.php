<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getSinglePost(Post $post)
    {
        return view('single-post',[
            'post' => $post,
            'comments' => $post->comments
        ]);
    }
}
