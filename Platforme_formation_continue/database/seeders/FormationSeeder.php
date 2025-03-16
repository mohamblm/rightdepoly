<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;

class FormationSeeder extends Seeder
{
    public function run()
    {
        $formations = [
            [
                'nom' => 'Stratégie de communication digitale',
                'description' => 'Élaborer et mettre en œuvre une stratégie de communication efficace sur les plateformes numériques.',
                'domaine_id' => 1, // Communication
                'image' => 'communication_digitale.jpg',
                'etablissement_id' => 1, // ISTA NTIC
            ],
            [
                'nom' => 'Techniques de communication interpersonnelle',
                'description' => 'Améliorer ses compétences en communication orale et écrite pour des interactions professionnelles réussies.',
                'domaine_id' => 1, // Communication
                'image' => 'communication_interpersonnelle.jpg',
                'etablissement_id' => 2, // IFMSAS
            ],
            [
                'nom' => 'Développement web avec Laravel',
                'description' => 'Apprendre à construire des applications web robustes et évolutives en utilisant le framework Laravel.',
                'domaine_id' => 2, // Informatique et systèmes d’information
                'image' => 'laravel_developpement.jpg',
                'etablissement_id' => 3, // CMC
            ],
            [
                'nom' => 'Administration de réseaux TCP/IP',
                'description' => 'Configurer, gérer et sécuriser les réseaux informatiques basés sur le protocole TCP/IP.',
                'domaine_id' => 2, // Informatique et systèmes d’information
                'image' => 'administration_reseaux.jpg',
                'etablissement_id' => 1, // ISTA NTIC
            ],
            [
                'nom' => 'Anglais des affaires',
                'description' => 'Développer ses compétences en anglais pour une communication efficace dans un contexte professionnel.',
                'domaine_id' => 3, // Langues
                'image' => 'anglais_affaires.jpg',
                'etablissement_id' => 4, // Autre Etablissement
            ],
            [
                'nom' => 'Français langue étrangère (FLE) - Niveau avancé',
                'description' => 'Perfectionner sa maîtrise de la langue française pour des usages professionnels et académiques.',
                'domaine_id' => 3, // Langues
                'image' => 'fle_avance.jpg',
                'etablissement_id' => 2, // IFMSAS
            ],
            [
                'nom' => 'Gestion des stocks et des entrepôts',
                'description' => 'Optimiser la gestion des stocks, l\'organisation des entrepôts et les flux de marchandises.',
                'domaine_id' => 4, // Logistique
                'image' => 'gestion_stocks.jpg',
                'etablissement_id' => 1, // ISTA NTIC
            ],
            [
                'nom' => 'Techniques d\'approvisionnement et d\'achat',
                'description' => 'Maîtriser les techniques d\'achat, la sélection des fournisseurs et la négociation des contrats.',
                'domaine_id' => 4, // Logistique
                'image' => 'techniques_approvisionnement.jpg',
                'etablissement_id' => 3, // CMC
            ],
            [
                'nom' => 'Leadership et gestion d\'équipe',
                'description' => 'Développer ses compétences en leadership pour motiver, guider et gérer efficacement une équipe.',
                'domaine_id' => 5, // Management
                'image' => 'leadership_gestion.jpg',
                'etablissement_id' => 2, // IFMSAS
            ],
            [
                'nom' => 'Gestion de projet agile',
                'description' => 'Appliquer les principes et les méthodes agiles pour la planification et la réalisation de projets complexes.',
                'domaine_id' => 5, // Management
                'image' => 'gestion_projet_agile.jpg',
                'etablissement_id' => 2, // IFMSAS
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }
    }
}