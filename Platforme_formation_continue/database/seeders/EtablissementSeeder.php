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
                'adresse' => 'Beni Mellal',
                'telephone' => '+2126000000',
                'created_at' => Carbon::parse('2024-01-02'),
                'updated_at' => Carbon::parse('2024-01-03'),
            ],
            [
                'nom' => 'Université Hassan II',
                'adresse' => 'Casablanca',
                'telephone' => '+212601234567',
                'created_at' => Carbon::parse('2024-02-10'),
                'updated_at' => Carbon::parse('2024-02-11'),
            ],
            [
                'nom' => 'École Supérieure de Technologie',
                'adresse' => 'Fès',
                'telephone' => '+212602345678',
                'created_at' => Carbon::parse('2024-03-15'),
                'updated_at' => Carbon::parse('2024-03-16'),
            ],
            [
                'nom' => 'Institut National des Postes et Télécommunications',
                'adresse' => 'Rabat',
                'telephone' => '+212603456789',
                'created_at' => Carbon::parse('2024-04-05'),
                'updated_at' => Carbon::parse('2024-04-06'),
            ],
            [
                'nom' => 'École Nationale des Sciences Appliquées',
                'adresse' => 'Tanger',
                'telephone' => '+212604567890',
                'created_at' => Carbon::parse('2024-05-20'),
                'updated_at' => Carbon::parse('2024-05-21'),
            ],
        ]);
    }
}
