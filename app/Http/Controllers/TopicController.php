<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Comment;

class TopicController extends Controller

{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = topic::latest()->paginate(10);
        return view('zanbob.index', compact('topics'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zanbob.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requestData["titre"] = $request->input('titre');
        $requestData["date"] = $request->input('date');
        $requestData["realisateur"] = $request->input('realisateur');
        $requestData["acteur"] = $request->input('acteur');
        $requestData["genre"] = $request->input('genre');
        $requestData["synopsis"] = $request->input('synopsis');
        $filename = time() . $request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('images', $filename, 'public');
        $requestData["poster"] = '/storage/' . $path;
        $topic = auth()->user()->topics()->create($requestData);
        return redirect()->route('zanbob.index', $topic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $comments['comments'] = Comment::query()
            ->where('id_movie', '=', $topic->id)
            ->get();

        return view('zanbob.show', compact('topic'), $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view('zanbob.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $requestData["titre"] = $request->input('titre');
        $requestData["date"] = $request->input('date');
        $requestData["realisateur"] = $request->input('realisateur');
        $requestData["acteur"] = $request->input('acteur');
        $requestData["genre"] = $request->input('genre');
        $requestData["synopsis"] = $request->input('synopsis');


        $filename = time() . $request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('images', $filename, 'public');
        $requestData["poster"] = '/storage/' . $path;
        $topic->update($requestData);


        return redirect()->back()->with("status", "Le film a bien été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);

        topic::destroy($topic->id);

        return redirect('/');
    }
}
