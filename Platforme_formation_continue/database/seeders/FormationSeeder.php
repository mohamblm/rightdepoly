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
                'nom' => 'Gestion des ressources humaines',
                'description' => 'Gestion administrative et statuaire, politique de GRH, relations sociales, et fonction formation.',
                'domaine_id' => 1, // Assuming this is the ID of the "Gestion des ressources humaines" domain in your domains table
                'image' => 'gestion_ressources_humaines.jpg',
                'etablissement_id' => 1, // Assuming this is the ID of the establishment in your etablissement table
            ],
            [
                'nom' => 'Management',
                'description' => 'Management stratégique, organisationnel, opérationnel, et des équipes.',
                'domaine_id' => 2,
                'image' => 'management.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Finances et gestion financière',
                'description' => 'Procédure budgétaire et comptable, gestion et stratégie financière, fiscalité.',
                'domaine_id' => 3,
                'image' => 'finances_gestion.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Communication',
                'description' => 'Stratégie de communication, techniques et outils de communication.',
                'domaine_id' => 4,
                'image' => 'communication.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Informatique et systèmes d’information',
                'description' => 'Architecture et administration des systèmes d’information, réseaux et télécommunication.',
                'domaine_id' => 5,
                'image' => 'informatique_systemes.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Sécurité - Hygiène',
                'description' => 'Prévention et opération d’incendie, sécurité dans la ville, gestion des risques technologiques et naturels.',
                'domaine_id' => 6,
                'image' => 'securite_hygiene.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Commerce et marketing',
                'description' => 'Stratégie marketing, technique commerciale et de vente.',
                'domaine_id' => 7,
                'image' => 'commerce_marketing.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Qualité',
                'description' => 'Amélioration de la qualité, assurance qualité, système de management qualité.',
                'domaine_id' => 8,
                'image' => 'qualite.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Technique',
                'description' => 'Gestion de la production, gestion et maîtrise de l’énergie, gestion de la maintenance.',
                'domaine_id' => 9,
                'image' => 'technique.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Logistique',
                'description' => 'Gestion des approvisionnements, gestion des stocks, gestion des magasins.',
                'domaine_id' => 10,
                'image' => 'logistique.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Environnement',
                'description' => 'Politique d’environnement, gestion des ressources, traitement des eaux usées et gestion des déchets.',
                'domaine_id' => 11,
                'image' => 'environnement.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Affaires juridiques',
                'description' => 'Mode et gestion des services publics, achats publics, contrats et assurances.',
                'domaine_id' => 12,
                'image' => 'affaires_juridiques.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Langues',
                'description' => 'Aspect général des langues, aspect technique et commercial des langues.',
                'domaine_id' => 13,
                'image' => 'langues.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Santé',
                'description' => 'Soins médicaux, secourisme, biomédical, soins dentaires et analyses médicales.',
                'domaine_id' => 14,
                'image' => 'sante.jpg',
                'etablissement_id' => 1,
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }
    }
}
