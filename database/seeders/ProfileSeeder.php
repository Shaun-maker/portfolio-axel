<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = [
            'title'         => 'Développeur web basé à Orléans.',
            'url_image_webp'     => '/images/profiles/profile.webp',
            'url_image'     => '/images/profiles/profile.jpg',
            'created_at'    => now(),
            'updated_at'    => now(),
            'description'   => 'Bonjour ! Je suis Axel Paillaud, développeur web passionné. Explorez mon portfolio pour en savoir plus sur mon travail !',
            'available'     => fake()->datetime(),
            'stack'         => 'PHP/Laravel,<br>React,<br>Javascript Vanilla,<br>SQL, MongoDB,<br>& more',
            'location'      => 'Développeur web sur Orléans, Loiret, France.<br>Mobile sur Tours, Blois, Paris.<br>Ouvert au full remote.',
        ];

        Profile::insert($profile);
    }
}
