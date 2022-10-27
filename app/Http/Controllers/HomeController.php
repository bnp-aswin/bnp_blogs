<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index',[
            'bannerPosts' => $posts->take(2),
            'posts' => $posts->skip(2),
            'popularPost' => $posts->sortBy('views')->reverse()->take(3),
            'categories' => Category::withCount(['posts'])->get()

        ]);
    }
}
