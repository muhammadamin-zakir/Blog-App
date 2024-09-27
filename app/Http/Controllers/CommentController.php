<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'comment' => 'required|string|max:500'
    //     ]);

    //     Comment::create([
    //         'user_id' => auth()->id(),
    //         'blog_id' => $request->blog_id,
    //         'content' => $request->comment
    //     ]);

    //     return redirect()->back()->with('message', 'Your comment has been added successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
            'blog_id' => 'required|exists:blogs,id', // Blog ID'sinin geçerli olduğundan emin olun
        ]);

        try {
            Comment::create([
                'user_id' => auth()->id(),
                'blog_id' => $request->blog_id,
                'content' => $request->comment
            ]);

            return redirect()->back()->with('message', 'Your comment has been added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
