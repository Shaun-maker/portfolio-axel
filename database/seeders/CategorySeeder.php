<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'projets pro'],
            ['name'=> 'projets perso'],
            ['name'=> 'projets de formation']
        ];

        Category::insert($categories);
    }
}
