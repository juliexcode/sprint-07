<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\topic;
use App\Models\comment;


class commentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(topic $topic)
    {
        request()->validate([
            'content' => 'required|min:5'
        ]);

        $comment = new comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;
        $topic->comments()->save($comment);
        return redirect()->route('topics.show', $topic);
    }

    public function storeCommentReply(comment $comment)
    {
        request()->validate([
            'replycomment' => 'required|min:2'
        ]);

        $commentReply = new comment();
        $commentReply->content = request('replycomment');
        $commentReply->user_id = auth()->user()->id;
        $comment->comments()->save($commentReply);
        return redirect()->back();
    }
}
