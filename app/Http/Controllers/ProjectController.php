<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->with('tools');

        if (request('category')) {
            $projects->where('category_id', request('category'));
        }
        return ProjectResource::collection($projects->get());
    }

    public function show($id)
    {
        return new ProjectResource(Project::findOrFail($id));
    }

    public function update($id)
    {
        return "hello, world";
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/')->with('success', 'The project ' . $project->title . ' has been deleted.');
    }
}
