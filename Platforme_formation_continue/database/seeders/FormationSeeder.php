<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        Formation::insert([
            [
                'nom' => 'Gestion de Projet',
                'description' => 'Formation avancée en gestion',
                'filiere_id' => 1,
                'etablissement_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Développement Web',
                'description' => 'Apprendre à créer des applications web modernes',
                'filiere_id' => 2,
                'etablissement_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Marketing Digital',
                'description' => 'Stratégies et outils pour le marketing en ligne',
                'filiere_id' => 3,
                'etablissement_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Réseaux et Sécurité',
                'description' => 'Les bases et avancées en cybersécurité',
                'filiere_id' => 4,
                'etablissement_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Comptabilité et Gestion',
                'description' => 'Principes et pratiques de la gestion financière',
                'filiere_id' => 5,
                'etablissement_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
