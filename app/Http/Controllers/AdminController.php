<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    //
    public function getDashboard()
    {
        return view('admin.dashboard');
    }

    public function getAddCategory()
    {   
        return view('admin.add-category',[
            'categories' => Category::all()
        ]);
    }

    public function setAddCategory(Request $request)
    {
        // dd('test');
        $category = $request->validate([
            'category' => ['required', 'min:3', 'max:20','unique:categories,name']
        ]);
        Category::create([
            'name' => $category['category']
        ]);
        return redirect()->back()->with('status', 'New Category added')->with('type', 'success');
    }

    public function getPosts()
    {
        $publishedPosts = Post::where('status', true)->paginate(10);
        $unpublishedPosts  = Post::where('status', false)->paginate(10);
        return view('admin.posts', compact('publishedPosts', 'unpublishedPosts'));
    }

    public function updatePostStatus(Request $request)
    {
        $data = $request->validate([
            'post_id' => ['required', Rule::exists('posts', 'id')]
        ]);
        $post = Post::where('id', $data['post_id'])->first();
        $post->update([
            'status' => !$post->status
        ]);
        return redirect()->back()->with('Post status updated successfully')->with('type', 'success');
        
    }
}
