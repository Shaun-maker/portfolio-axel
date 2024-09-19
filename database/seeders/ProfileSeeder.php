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
            'introduction'   => 'Bonjour ! Je suis Axel Paillaud, développeur web passionné. Explorez mon portfolio pour en savoir plus sur mon travail !',
            'available'     => fake()->datetime(),
            'description'   => '
            <p><b>Axel Paillaud</b>, 30 ans.</p>
            <p>
            Développeur web indépendant sur Orléans,<br>
            en région Centre-val de Loire.<br>
            Mobile sur Paris, Tours, Blois.
            </p>
            <p>Plus de deux ans d\'expérience an agence web.</p>
            <br>
            <p><b>Mes services</b></p>
            <p>Création de site internet sur-mesure, site vitrine, portfolios...</p>
            <p>Solution logicielle web sur-mesure.</p>
            <p>Maintenance de site web WordPress ou PrestaShop déjà existant.</p>
            <p>Accompagnement pour aider à créer son site web soi-même, avec HTML/CSS ou CMS WordPress/PrestaShop.</p>
            ',
            // 'stack'         => 'PHP/Laravel,<br>React,<br>Javascript Vanilla,<br>SQL, MongoDB,<br>& more',
            // 'location'      => 'Développeur web sur Orléans, Loiret, France.<br>Mobile sur Tours, Blois, Paris.<br>Ouvert au full remote.',
        ];

        Profile::insert($profile);
    }
}
