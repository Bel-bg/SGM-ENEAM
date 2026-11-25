<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère ou crée le rôle 'etudiant'
        $roleEtudiant = Role::firstOrCreate(['nom' => 'etudiant']);

        $etudiants = [
            [
                'matricule'      => '10584925',
                'name'           => 'FIODEKANHOUN',
                'prenom'         => 'Belmonde',
                'email'          => 'belmondefio@gmail.com',
                'filiere'        => 'Informatique de Gestion',
                'niveau'         => 'Licence 3',
                'annee_scolaire' => '2026-2027',
            ],
            [
                'matricule'      => '10147925',
                'name'           => 'AKONDE',
                'prenom'         => 'Daniel',
                'email'          => 'akondedaniel27@gmail.com',
                'filiere'        => 'Informatique de Gestion',
                'niveau'         => 'Licence 3',
                'annee_scolaire' => '2026-2027',
            ],
            [
                'matricule'      => '12861024',
                'name'           => 'LIAMIDI-AHOUNASOU',
                'prenom'         => 'Atinukè Machekourath',
                'email'          => 'liamidiahouansoumachekourath@gmail.com',
                'filiere'        => 'Informatique de Gestion',
                'niveau'         => 'Master 2',
                'annee_scolaire' => '2026-2027',
            ],
            [
                'matricule'      => '13207624',
                'name'           => 'DJIVO',
                'prenom'         => 'Gilchrist Onacisse',
                'email'          => 'onacissedjivo873@gmail.com',
                'filiere'        => 'Informatique de Gestion',
                'niveau'         => 'Master 2',
                'annee_scolaire' => '2026-2027',
            ],
        ];

        foreach ($etudiants as $data) {
            // 1. Création ou mise à jour du compte User
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'     => $data['name'],
                    'prenom'   => $data['prenom'],
                    'password' => null,
                ]
            );

            // 2. Attribution du rôle 'etudiant' sans doublon
            $user->roles()->syncWithoutDetaching([$roleEtudiant->id]);

            // 3. Création ou mise à jour du profil académique Etudiant
            Etudiant::updateOrCreate(
                ['matricule' => $data['matricule']],
                [
                    'user_id'        => $user->id,
                    'filiere'        => $data['filiere'],
                    'niveau'         => $data['niveau'],
                    'annee_scolaire' => $data['annee_scolaire'],
                ]
            );
        }
    }
}
