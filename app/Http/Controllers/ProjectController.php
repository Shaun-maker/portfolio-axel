<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use App\Services\ImageProcessor;
use Imagick;

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
        $project = Project::findOrFail($id);

        $attributes = $request->validate([
            'project.title' => [ 'min:3', 'max:255', 'required'],
            'project.description' => ['required'],
            'project.category_id' => ['required'],
            'project.project_link' => ['max:255'],
            'project.source_link' => ['max:255'],
            'tools' => ['max:6']
        ]);

        $project->update($attributes['project']);

        $project->tools()->sync($attributes['tools']);

        if ($request->hasFile('project.image') && $request->file('project.image')->isValid()) {
            $path = $request->file('project.image')->store('images/projects');

            $imageProcessor = new ImageProcessor(new Imagick($path), $path);

            $cloneImagePath = $imageProcessor
                ->resizeImage(0, 640)
                ->convertImage('webp')
                ->autoRotateImage()
                ->cloneImage()
                ->destroy();

            $project->update(['url_image' => $path]);
            $project->update(['url_image_webp' => $cloneImagePath]);
        }

        return redirect('/')->with('success', 'The project ' . $project->title . ' has been updated.');
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
