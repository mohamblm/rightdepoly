<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etablissement;

class EtablissementSeeder extends Seeder
{
    public function run()
    {
        Etablissement::create([
            'nom'          => 'ISTA NTIC',
            'adresse'      => '123 Rue Exemple, Béni Mellal',
            'telephone'    => '+212 123456789',
            'localisation' => 'Béni Mellal, Maroc',
            'logo'         => 'OFPPT.png',
            'image'        => 'ista ntic.jpg',
            'description'  => 'Member of the SABIS Network, providing high-quality education through a rigorous academic program and digital learning platform.',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        Etablissement::create([
            'nom'          => 'IFMSAS',
            'adresse'      => '456 Rue Exemple, Béni Mellal',
            'telephone'    => '+212 987654321',
            'localisation' => 'Béni Mellal, Maroc',
            'logo'         => 'OFPPT.png',
            'image'        => 'ifmsas.jpg',
            'description'  => 'Member of the SABIS Network, providing high-quality education through a rigorous academic program and digital learning platform.',
            'created_at'   => now(),    
            'updated_at'   => now(),
        ]);
        Etablissement::create([
            'nom'          => 'CMC',
            'adresse'      => '1290 Rue 12, Béni Mellal',
            'telephone'    => '+212 987654321',
            'localisation' => 'Béni Mellal, Maroc',
            'logo'         => 'OFPPT.png',
            'image'        => 'cmc.jpg',
            'description'  => 'Member of the SABIS Network, providing high-quality education through a rigorous academic program and digital learning platform.',
            'created_at'   => now(),    
            'updated_at'   => now(),
        ]);

    }
}
