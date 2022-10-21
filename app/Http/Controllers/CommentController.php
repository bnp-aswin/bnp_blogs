<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $comment = $request->validate([
            'post_id' => ['required'],
            'comment' => ['required'],
            'username' => Rule::requiredIf(!auth()->check()),
            'email' => Rule::requiredIf(!auth()->check())
        ]);
        if (auth()->check()) {
            Comment::create([
                'post_id' => $comment['post_id'],
                'comment' => $comment['comment'],
                'username' => auth()->user()->name,
                'email' => auth()->user()->email
            ]);
        }else{
            Comment::create($comment);
        }
        
        return redirect()->back()->with('status', 'Comment Posted successfuly');
    }
}
