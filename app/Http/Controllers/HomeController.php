<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index',[
            'bannerPosts' => $posts->take(2),
            'posts' => $posts->skip(2)
        ]);
    }
}
