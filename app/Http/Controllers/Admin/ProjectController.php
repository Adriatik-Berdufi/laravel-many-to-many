<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::paginate();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $technologies = Technology::all();
        return view('admin.projects.create',compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
       

        $data = $request->all();
        $new_project = new Project;
        $new_project->fill($data);
        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project)->with('message', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {   
        $technologies = Technology::all();
        return view('admin.projects.show', compact('project','technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {   
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->update($data);
        return redirect()->route('admin.projects.show', compact('project'))->with('message', 'Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        $project->delete();

    return redirect()->route('admin.projects.index')->with('success', 'Il progetto è stato eliminato con successo.');
    }
}
