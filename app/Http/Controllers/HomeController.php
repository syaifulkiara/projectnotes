<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dones    = Project::where('status','=','done')->get();
        $progress = Project::where('status','=','in_progress')->get();
        $rejected = Project::where('status','=','rejected')->get();
        $feedback = Project::where('status','=','needs_feedback')->get();
        return view('home', compact('dones','progress','rejected','feedback'));
    }
}
