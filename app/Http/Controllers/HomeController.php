<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tool;
use App\Models\Category;
use App\Models\Profile;

class HomeController extends Controller
{
    public function __invoke() 
    {
        return view('home', [
            'projects'      => Project::with('tools')->get(),
            'tools'         => Tool::all(),
            'categories'    => Category::all(),
            'profile'       => Profile::first(),
        ]);
    }
}
