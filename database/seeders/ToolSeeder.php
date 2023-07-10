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
            ['name' => 'GitHub',            'icon' => 'fa-brands fa-github'],
            ['name' => 'Laravel',           'icon' =>'fa-brands fa-laravel'],
            ['name' => 'JavaScript',        'icon' => 'fa-brands fa-js'],
            ['name' => 'PHP',               'icon' => 'fa-brands fa-php'],
            ['name' => 'Python',            'icon' => 'fa-brands fa-python'],
            ['name' => 'React',             'icon' => 'fa-brands fa-react'],
        ];

        Tool::insert($icons);
    }
}
