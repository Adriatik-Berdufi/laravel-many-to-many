<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::select("id","title","author", "image","description","project_link")
        ->with('technologies:id,label,color')
        ->paginate();

        foreach($projects as $project){
            $project->image = !empty($project->image) ? asset('/storage/' . $project->image) : null;
        }
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        echo 'ciao';
    }

}
