<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function __invoke() 
    {
        return view('home', [
            //'projects' => Project::with('tools')->where('category_id', '1')->latest()->get(),
            'projects' => Project::with('tools')->get()
        ]);
    }
}
