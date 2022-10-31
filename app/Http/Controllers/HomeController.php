<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3)->fragment('posts');
        $popularPost = $posts->sortBy('views')->reverse()->take(4);
        $categories = Category::withCount(['posts'])->get();
        return view('index', compact('posts', 'popularPost', 'categories'));
    }
}
