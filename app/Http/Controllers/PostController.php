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
            return response()
                ->view('single-post', [
                    'post' => $post,
                    'comments' => $post->comments,
                    'popularPost' => Post::all()->sortBy('views')->reverse()->take(3),
                    'categories' => Category::withCount(['posts'])->get()
                ])
                ->withCookie($cookie);
        } else {
            return  view('single-post', [
                'post' => $post,
                'comments' => $post->comments,
                'popularPost' => Post::all()->sortBy('views')->reverse()->take(3),
                'categories' => Category::withCount(['posts'])->get()
            ]);
        }
    }

    public function getAddPost()
    {
        return view('user.add-post',[
            'categories' => Category::all()
        ]);
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
        // dd($post['thumbnail']->file('thumbnail'));
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
        return view('user.view-posts', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function getEditPost(Post $post)
    {
        return view('user.edit-post',[
            'post' => $post,
            'categories' => Category::all()
        ]);
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
        return view('posts', [
            'posts' => $category->posts()->get(),
            'title' => "$category->name " .'Category'
        ]);
    }

    public function getByAuthor(User $author)
    {
        return view('posts', [
            'posts' => $author->posts()->get(),
            'title' => 'Author ' . "$author->name"
        ]);
    }

    public function getSearch()
    {
        $search = request('search');
        $posts = Post::where('title', 'Like', "%{$search}%")
            ->orWhere('body', 'Like', "%{$search}%")
            ->get();
        
        return view('posts', [
            'posts' => $posts,
            'title' => 'Search result'
        ]);
    }
}
