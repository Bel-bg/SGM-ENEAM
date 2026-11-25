<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('password');

        // 1. Créer les 4 rôles
        $roleAdmin    = Role::firstOrCreate(['nom' => 'admin'], ['description' => 'Administrateur système']);
        $roleChefDep  = Role::firstOrCreate(['nom' => 'chef_dep'], ['description' => 'Chef de département']);
        $roleBiblio   = Role::firstOrCreate(['nom' => 'biblio'], ['description' => 'Bibliothécaire']);
        $roleEtudiant = Role::firstOrCreate(['nom' => 'etudiant'], ['description' => 'Étudiant ENEAM']);

        // 2. Définir les 4 utilisateurs actifs de test
        $users = [
            [
                'role' => $roleAdmin,
                'data' => [
                    'name'              => 'ADMIN',
                    'prenom'            => 'Système',
                    'email'             => 'admin@eneam.bj',
                    'matricule'         => 'ADM-001',
                    'email_verified_at' => now(),
                    'password'          => $password,
                    'otp_code'          => null,
                    'otp_expires_at'    => null,
                    'invitation_token'  => null,
                ],
            ],
            [
                'role' => $roleChefDep,
                'data' => [
                    'name'              => 'CHEF',
                    'prenom'            => 'Département',
                    'email'             => 'chef_dep@eneam.bj',
                    'matricule'         => 'CHF-001',
                    'email_verified_at' => now(),
                    'password'          => $password,
                    'otp_code'          => null,
                    'otp_expires_at'    => null,
                    'invitation_token'  => null,
                ],
            ],
            [
                'role' => $roleBiblio,
                'data' => [
                    'name'              => 'BIBLIO',
                    'prenom'            => 'Responsable',
                    'email'             => 'biblio@eneam.bj',
                    'matricule'         => 'BIB-001',
                    'email_verified_at' => now(),
                    'password'          => $password,
                    'otp_code'          => null,
                    'otp_expires_at'    => null,
                    'invitation_token'  => null,
                ],
            ],
            [
                'role' => $roleEtudiant,
                'data' => [
                    'name'              => 'DANIEL',
                    'prenom'            => 'Étudiant',
                    'email'             => 'etudiant@eneam.bj',
                    'matricule'         => 'ETU-2026-001',
                    'email_verified_at' => now(),
                    'password'          => $password,
                    'otp_code'          => null,
                    'otp_expires_at'    => null,
                    'invitation_token'  => null,
                ],
            ],
        ];

        // 3. Créer ou mettre à jour chaque utilisateur et lui assigner son rôle
        foreach ($users as $item) {
            $user = User::updateOrCreate(
                ['email' => $item['data']['email']],
                $item['data']
            );

            $user->roles()->syncWithoutDetaching([$item['role']->id]);
        }
    }
}
