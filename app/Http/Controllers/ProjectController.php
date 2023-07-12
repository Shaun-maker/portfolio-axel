<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        return new ProjectResource(Project::findOrFail($id));
    }
}
