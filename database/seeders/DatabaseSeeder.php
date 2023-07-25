<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

/*         \App\Models\User::factory()->create([
            'name' => 'Axel Test',
            'email' => 'axel@example.com',
            'password' => 'password'
        ]); */

        $this->call(ProfileSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ToolSeeder::class);
        //$this->call(ProjectSeeder::class);
    }
}
