<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tool;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory(10)->create();

        foreach(Project::all() as $project) {
            $tools = Tool::inRandomOrder()->take(rand(3, 5))->get();
            foreach($tools as $tool) {
                $project->tools()->attach($tool->id);
            }
        }
    }
}
