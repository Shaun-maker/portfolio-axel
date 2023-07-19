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
            'title'         => 'Développeur web freelance basé à Orléans.',
            'url_image'     => '/images/profile.webp',
            'created_at'    => now(),
            'updated_at'    => now(),
            'description'   => 'Bonjour ! Je suis Axel Paillaud, développeur web passionné. Explorez mon portfolio pour en savoir plus sur mon travail !',
            'available'     => 'septembre 2023',
            'stack'         => 'Fullstack<br>PHP/Laravel,<br>Javascript,<br>& more',
            'location'      => 'Développeur web sur Orléans, Loiret.<br>Mobile sur Tours, Blois, Paris.<br>Ouvert au full remote.',
        ];

        Profile::insert($profile);
    }
}
