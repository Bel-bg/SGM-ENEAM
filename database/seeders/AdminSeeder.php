<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Création des 4 rôles du système s'ils n'existent pas encore
        $roleAdmin = Role::firstOrCreate(['nom' => 'admin']);
        Role::firstOrCreate(['nom' => 'chef_departement']);
        Role::firstOrCreate(['nom' => 'bibliothecaire']);
        Role::firstOrCreate(['nom' => 'etudiant']);

        // 2. Création ou mise à jour du compte Administrateur principal
        $admin = User::updateOrCreate(
            ['email' => 'sgm@eneam.uac.bj'], 
            [
                'name'              => 'SGM-ENEAM',
                'prenom'            => 'uac',
                'password'          => Hash::make('SGMAdmin@2026!'), 
                'email_verified_at' => now(),
                'invitation_token'  => null,
            ]
        );

        // 3. Attribution du rôle 'admin' sans doublon
        $admin->roles()->syncWithoutDetaching([$roleAdmin->id]);
    }
}
