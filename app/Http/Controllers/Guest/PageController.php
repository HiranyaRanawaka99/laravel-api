<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class PageController extends Controller
{
  public function index()
  {
    $title = "Homepage";

    //$project = Project::orderByDesc('created_at')->paginate(8);
    $projects = Project::where('published', 1)->paginate(8); 

    return view('guest.home', compact('title', 'projects' ));
  }

  public function all_projects()
  {
    $title = "All projects";
    $projects = Project::orderByDesc('created_at')->where('published', 1)->paginate(8);
    return view('guest.all-projects', compact('title', 'projects'));
  }

  public function detail_project(int $id)
  {
    $project = Project::where('published', 1)->first();
    if (!$project)
      abort(404);

    return view('guest.detail-project', compact('project'));
  }
}