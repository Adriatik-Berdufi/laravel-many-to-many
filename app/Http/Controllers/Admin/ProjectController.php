<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $project = new Project;
        $category = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.create',compact('project','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $rules = Project::getValidationRules();
        $data = $request->validate($rules);
        $img_path = Storage::put('uploads/projects', $data['image']);
        
        $new_project = new Project;
        $new_project->image = $img_path;
        $new_project->fill($data);
        $new_project->save();

        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->input('technologies'));
        }

        return redirect()->route('admin.projects.show', $new_project)->with('message', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {   
        $technologies = $project->technologies;
        $category = $project->category;
        return view('admin.projects.show', compact('project', 'technologies', 'category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {   
        $category = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project','technologies','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     */
    public function update(Request $request, Project $project)
    {
        $rules = Project::getValidationRules();
        $data = $request->validate($rules);
        
        if(Arr::exists($data , 'image')){
            if(!empty($project->image)){
                Storage::delete($project->image);
            }
            $img_path = Storage::put('uploads/projects', $data['image']); 
            $project->image = $img_path;
        }
        $project->update($data);


        if ($request->has('technologies')) {
            $project->technologies()->sync($request->input('technologies'));
        } else {
            $project->technologies()->detach();
        }
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
