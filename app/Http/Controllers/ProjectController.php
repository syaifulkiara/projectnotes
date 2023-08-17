<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projects               = new Project;
        $projects->id_user      = Auth::user()->id;
        $projects->project_name = $request->project_name;
        $projects->status       = $request->status;
        $projects->description  = $request->description;
        $projects->save();
        
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::find($id);
        return view('projects.edit', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projects               = Project::find($id);
        $projects->project_name = $request->project_name;
        $projects->status       = $request->status;
        $projects->description  = $request->description;
        $projects->save();
        
        return redirect('projects/my_project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::find($id);
        $projects->delete();
        
        return redirect('projects/my_project');
    }

    public function my_project()
    {
        $data = User::with('my_project')->where('id', Auth::user()->id)->first();
        return view('projects.my_project', compact('data'));
    }

    public function done()
    {
        $dones = Project::where('status','=','done')->get();
        return view('projects.done', compact('dones'));
    }

    public function progress()
    {
        $progress = Project::where('status','=','in_progress')->get();
        return view('projects.progress', compact('progress'));
    }

    public function rejected()
    {
        $rejected = Project::where('status','=','rejected')->get();
        return view('projects.rejected', compact('rejected'));
    }

    public function feedback()
    {
        $feedback = Project::where('status','=','needs_feedback')->get();
        return view('projects.feedback', compact('feedback'));
    }
}
