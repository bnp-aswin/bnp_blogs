<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $comment = $request->validate([
            'post_id' => ['required'],
            'comment' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email:rfc,dns']
        ]);
        Comment::create($comment);
        return redirect()->back()->with('status', 'Comment Posted successfuly');
    }
}
