<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function getSinglePost(Post $post)
    {
        return view('single-post',[
            'post' => $post,
            'comments' => $post->comments
        ]);
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
            'user_id' => ['required'],
            'category' => ['required'],
            'title' => ['required'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'thumbnail' => ['required']
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
            'category' => ['required'],
            'title' => ['required'],
            'excerpt' => ['required'],
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
        $post->comments()->delete();
        $currentPostImg = $post->thumbnail;
        Storage::delete($currentPostImg);
        $post->delete();
        return redirect()->back()->with('status', 'Post deleted successfully');
    }
}
