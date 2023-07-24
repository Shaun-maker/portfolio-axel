<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

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

    public function edit($id)
    {
        return new ProjectResource(Project::findOrFail($id));
    }

    public function update($id, Request $request): RedirectResponse
    {
        //dd($request->all());

        $attributes = $request->validate([
            'project.title' => [ 'min:3', 'max:255', 'required'],
            'project.description' => ['required'],
            'project.category' => ['required'],
            'project.link' => ['max:255'],
            'project.source' => ['max:255'],
        ]);

        dd(request());
    }

    public function store()
    {
        // TODO : create project
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/')->with('success', 'The project ' . $project->title . ' has been deleted.');
    }
}
