<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    public function index()
    {
        $projects=Project::all();
        return view('admin.projects.index',compact('projects'));
    }


    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project=Project::create($request->all());
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Project::find($id);
        return view('admin.projects.show',compact('project'));
    }

    public function edit($id)
    {
        $project=Project::find($id);
        return view('admin.projects.edit',compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project=Project::find($id);
        $project->name=$request->name;
        $project->contract=$request->contract;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->appr_amount=$request->appr_amount;
        $project->cost_amount=$request->cost_amount;
        $project->description=$request->description;
        $project->status=$request->status;
        $project->save();
        return view('admin.projects.index',compact('project'));
    }

    public function destroy($id)
    {
        //
    }
}
