<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::select("id", "title", "description", "link", "date", 'type_id')
        ->with('type:id,tag,color', 'technologies:id,label,color')
        ->orderByDesc('id')
        ->paginate(3);

        foreach ($projects as $project) {
            $project->cover_image = $project->getAbsUriImage();
        }
    return response()->json($projects);
    }
    //Specifichiamo i campi che vogliamo vedere in vue


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::select("id", "title", "link", "description", "date", 'type_id')
        ->with('type:id,tag,color', 'technologies:id,label,color')
        ->first();

        $project->cover_image = $project->getAbsUriImage();

    return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
