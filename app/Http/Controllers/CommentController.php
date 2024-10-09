<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    
    public function store(Request $request, Post $post)
    {
        if (!auth()->id()) {
            // abort(403);
            $danger = ['Please log in to comment on this post'];
            // return redirect()->route('login', compact('danger'));
            return view('auth.login', compact('danger'));
        }

        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'comment' => $validated['comment'],
        ]);


        return back();
    }

    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id && auth()->id() !== $comment->post->user_id) {
            abort(403);
        }

        $comment->delete();

        return back();
    }
}

