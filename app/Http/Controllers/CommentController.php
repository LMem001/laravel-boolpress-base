<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('message', 'Il commento è stato eliminato!');
    }
}
