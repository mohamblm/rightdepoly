<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etablissement;
use Carbon\Carbon;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etablissement::insert([
            [
                'nom' => 'OFPPT Béni Mellal',
                'adresse' => 'Morroc - Béni Mellal',
                'telephone' => '+2126000000',
                'localisation'=>null,
                'image'=>null,
                'created_at' => Carbon::parse('2024-01-02'),
                'updated_at' => Carbon::parse('2024-01-03'),
            ],
            [
                'nom' => 'CMC Béni Mellal',
                'adresse' => 'Morroc - Béni Mellal',
                'telephone' => '+212601234567',
                'localisation'=>null,
                'image'=>null,
                'created_at' => Carbon::parse('2024-02-10'),
                'updated_at' => Carbon::parse('2024-02-11'),
            ],
            [
                'nom' => 'IFMSAS Béni Mellal',
                'adresse' => 'Morroc - Béni Mellal',
                'telephone' => '+212602345678',
                'localisation'=>null,
                'image'=>null,
                'created_at' => Carbon::parse('2024-03-15'),
                'updated_at' => Carbon::parse('2024-03-16'),
            ],
            [
                'nom' => 'OFPPT NTIC Béni Mellal',
                'adresse' => 'Morroc - Béni Mellal',
                'telephone' => '+212603456789',
                'localisation'=>null,
                'image'=>null,
                'created_at' => Carbon::parse('2024-04-20'),
                'updated_at' => Carbon::parse('2024-04-21'),
            ],
        ]);
    }
}
