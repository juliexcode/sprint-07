<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class commentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Topic $topic)
    {
        $id_movie = trim($request->get('inputIdMovie'));
        $request->validate([
            'content' => 'required|min:2',

        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->id_movie = $id_movie;
        $comment->save();

        $comments['comments'] = Comment::query()
            ->where('id_movie', '=', $id_movie)
            ->get();

        $topic['topic'] = Topic::query()
            ->where('id', '=', $id_movie)
            ->get();

        return redirect()->back();
    }



    public function edit(Comment $comment)
    {

        return view('zanbob.comment', compact('comment'));
    }




    public function update(Request $request, $commentId)
    {

        $id_movie = trim($request->get('inputIdMovie'));
        $request->validate([
            'content' => 'required|min:2',

        ]);

        $comment = Comment::find($commentId);
        $comment->content = $request->content;

        $comment->save();

        $comments['comments'] = Comment::query()
            ->where('id_movie', '=', $id_movie)
            ->get();

        $topic['topic'] = Topic::query()
            ->where('id', '=', $id_movie)
            ->get();

        return redirect()->back()->with("status", "Le commentaire a bien été modifié!");
    }


    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();



        return redirect()->back();
    }
}
