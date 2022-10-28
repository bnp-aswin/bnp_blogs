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
            'posts' => $posts,
            'popularPost' => $posts->sortBy('views')->reverse()->take(4),
            'categories' => Category::withCount(['posts'])->get()

        ]);
    }
}
