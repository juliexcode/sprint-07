<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\topic;
use App\Models\comment;
use Illuminate\Support\Facades\Log;

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
        $topic->comments()->create($comment);
        return redirect()->route('topics.show', $topic);
    }


    public function destroy(comment $comment)
    {
        $comment->delete();
        // Log::debug($comment);
        // comment::destroy($comment);


        return redirect()->back();
    }
}
