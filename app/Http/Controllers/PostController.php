<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class PostController extends Controller
{
    public function getSinglePost(Post $post, Request $request)
    {
        
        if (!Auth::check()) {
            $postCookie = (Str::replace('.', '', ($request->ip())) . '-' . $post->id);
        } else {
            $postCookie = (Auth::user()->id . '-' . $post->id);
        }
        if (Cookie::get($postCookie) == '') {
            $cookie = cookie($postCookie, '1', 60);
            $post->increment('views');
            $comments = $post->comments;
            $popularPost = Post::all()->sortBy('views')->reverse()->take(3);
            $categories = Category::withCount(['posts'])->get();
            return response()
                ->view('single-post', compact('post', 'comments', 'popularPost', 'categories'))
                ->withCookie($cookie);
        } 
        else {
            $comments = $post->comments;
            $popularPost = Post::all()->sortBy('views')->reverse()->take(3);
            $categories = Category::withCount(['posts'])->get();
            return  view('single-post', compact('post', 'comments', 'popularPost', 'categories'));
        }
    }

    public function getAddPost()
    {
        $categories = Category::all();
        return view('user.add-post', compact('categories'));
    }

    public function setAddPost(Request $request)
    {
        $post = $request->validate([
            'user_id' => ['required',Rule::exists('users', 'id')],
            'category' => ['required', Rule::exists('categories', 'id')],
            'title' => ['required', Rule::unique('posts', 'title')],
            'excerpt' => ['required','min:100', 'max:512'],
            'body' => ['required'],
            'thumbnail' => 'bail|required|file|max:2048|mimes:png'
        ],
        [
            'thumbnail.file' => "The thumbnail must be a file of type: png.",
            'thumbnail.max' => 'The thumbnail size must be below 2048kb',
            'thumbnail.mimes' => "The thumbnail must be a file of type: png.",
        ]);
        Post::create([
            'user_id' => $post['user_id'],
            'category_id' => $post['category'],
            'title' => $post['title'],
            'slug' => Str::slug($post['title']),
            'excerpt' => $post['excerpt'],
            'body' => $post['body'],
            'thumbnail' => $request->file('thumbnail')->store('thumbnails')
        ]);
        return redirect()->route('posts.show')->with('status', 'New Post created');
    }

    public function getPosts()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('user.view-posts', compact('posts'));
    }

    public function getEditPost(Post $post)
    {
        $categories = Category::all();
        return view('user.edit-post', compact('post', 'categories'));
    }

    public function setEditPost(Post $post, Request $request)
    {
        $data = $request->validate([
            'category' => ['required', Rule::exists('categories', 'id')],
            'title' => ['required'],
            'excerpt' => ['required','min:100', 'max:512'],
            'body' => ['required'],
        ]);
        $oldImgPath = $post->thumbnail;
        if($request->file('thumbnail')){
            Storage::delete($oldImgPath);
            $newImgPath = $request->file('thumbnail')->store('thumbnails');
        }else{
            $newImgPath = $oldImgPath;
        }
        $post->update([
            'title' => $data['title'],
            'category_id' => $data['category'],
            'excerpt' => $data['excerpt'],
            'body' => $data['excerpt'],
            'slug' => Str::slug($data['title']),
            'thumbnail' => $newImgPath
        ]);
        return redirect()->route('posts.show')->with('status', 'Post Updated successfully');
        
    }

    public function deletePost(Post $post)
    {
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->back()->with('status', 'Post deleted successfully');
    }

    public function getByCategory(Category $category)
    {
        $posts = $category->posts()->get();
        $title = "$category->name " .'Category';
        return view('posts', compact('posts', 'title'));
    }

    public function getByAuthor(User $author)
    {
        $posts = $author->posts()->get();
        $title = 'Author ' . "$author->name";
        return view('posts', compact('posts', 'title'));
    }

    public function getSearch()
    {
        $search = request('search');
        $posts = Post::where('title', 'Like', "%{$search}%")
            ->orWhere('body', 'Like', "%{$search}%")
            ->get();
        $title = 'Search result';
        return view('posts', compact('posts', 'title'));
    }
}
