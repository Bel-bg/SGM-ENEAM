<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        $filieres = [
            ['code' => 'IG',   'nom' => 'Informatique de Gestion'],
            ['code' => 'AIP',  'nom' => 'Analyse Informatique et Programmation'],
            ['code' => 'ARI',  'nom' => 'Administration des Réseaux Informatiques'],
            ['code' => 'STAT', 'nom' => 'Statistique'],
            ['code' => 'ISE',  'nom' => 'Ingénieur Statisticien Économiste'],
            ['code' => 'PLAN', 'nom' => 'Planification et Gestion des Projets'],
            ['code' => 'GFC',  'nom' => 'Gestion Financière et Comptable'],
            ['code' => 'GTL',  'nom' => 'Gestion des Transports et Logistique'],
            ['code' => 'GRH',  'nom' => 'Gestion des Ressources Humaines'],
            ['code' => 'GBA',  'nom' => 'Gestion des Banques et Assurances'],
            ['code' => 'GCO',  'nom' => 'Gestion Commerciale'],
        ];

        foreach ($filieres as $filiere) {
            Filiere::updateOrCreate(
                ['nom' => $filiere['nom']],
                $filiere
            );
        }
    }
}
