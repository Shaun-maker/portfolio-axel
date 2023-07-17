<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $icons = [
            ['name' => 'GitHub',            'icon' => "<i class='fa-brands fa-github'></i>"],
            ['name' => 'Laravel',           'icon' => "<i class='fa-brands fa-laravel'></i>"],
            ['name' => 'JavaScript',        'icon' => "<i class='fa-brands fa-js'></i>"],
            ['name' => 'PHP',               'icon' => "<i class='fa-brands fa-php'></i>"],
            ['name' => 'Python',            'icon' => "<i class='fa-brands fa-python'></i>"],
            ['name' => 'React',             'icon' => "<i class='fa-brands fa-react'></i>"],
        ];

        Tool::insert($icons);
    }
}
