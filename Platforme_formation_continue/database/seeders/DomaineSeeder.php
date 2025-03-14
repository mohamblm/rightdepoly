<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomaineSeeder extends Seeder
{
    public function run()
    {
        $domaines = [
            ['nom' => 'Technique', 'description' => 'Formations liées à la gestion technique et industrielle.'],
            ['nom' => 'Logistique', 'description' => 'Formations sur la gestion des stocks, approvisionnements et magasins.'],
            ['nom' => 'Environnement', 'description' => 'Gestion des ressources, traitement des déchets et des eaux.'],
            ['nom' => 'Affaires juridiques', 'description' => 'Droit, assurances et marchés publics.'],
            ['nom' => 'Langues', 'description' => 'Aspects généraux et techniques des langues.'],
            ['nom' => 'Santé', 'description' => 'Soins médicaux, diagnostics et analyses médicales.'],
            ['nom' => 'Alphabétisation fonctionnelle', 'description' => 'Programmes d’alphabétisation et d’apprentissage.'],
            ['nom' => 'Gestion des ressources humaines', 'description' => 'Politiques RH, relations sociales et conditions de travail.'],
            ['nom' => 'Management', 'description' => 'Stratégie, organisation et gestion des équipes.'],
            ['nom' => 'Finances et gestion financière', 'description' => 'Fiscalité, comptabilité et gestion budgétaire.'],
            ['nom' => 'Communication', 'description' => 'Stratégies et outils de communication.'],
            ['nom' => 'Informatique et systèmes d’information', 'description' => 'Réseaux, administration et outils informatiques.'],
            ['nom' => 'Sécurité - Hygiène', 'description' => 'Prévention des risques et sécurité au travail.'],
            ['nom' => 'Commerce et marketing', 'description' => 'Marketing, commerce et techniques de vente.'],
            ['nom' => 'Qualité', 'description' => 'Gestion et amélioration de la qualité.'],
        ];

        DB::table('domaines')->insert($domaines);
    }
}





