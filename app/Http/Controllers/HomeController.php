<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topics = topic::latest()->paginate(10);
        return view('zanbob.index', compact('topics'));
    }
}
