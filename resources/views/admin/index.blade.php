@extends('layouts.admin')

@section('title', 'Tableau de bord Administration | [SGM]-ENEAM')
@section('page-title', 'Vue d’ensemble')

@section('content')
    <!-- Indicateurs clés -->
    <div class="admin-stats-grille">
        <div class="admin-stat-carte">
            <p class="admin-stat-label">Étudiants enregistrés</p>
            <p class="admin-stat-valeur">{{ \App\Models\Etudiant::count() }}</p>
        </div>

        <div class="admin-stat-carte">
            <p class="admin-stat-label">Personnel Administration</p>
            <p class="admin-stat-valeur">
                {{ \App\Models\User::whereHas('roles', fn($q) => $q->whereIn('nom', ['admin', 'chef_departement', 'bibliothecaire']))->count() }}
            </p>
        </div>

        <div class="admin-stat-carte">
            <p class="admin-stat-label">Mémoires publiés</p>
            <p class="admin-stat-valeur">0</p>
        </div>
    </div>

    <!-- Bloc de bienvenue / Actions rapides -->
    <div class="admin-carte">
        <h2 style="font-size: 18px; font-weight: 700; margin: 0 0 10px;">
            Bienvenue, {{ Auth::user()->prenom ?? Auth::user()->name }}
        </h2>
        <p style="font-size: 14px; color: var(--texte-discret); margin: 0;">
            Utilisez le menu latéral à gauche pour gérer les mémoires, valider les dépôts ou administrer les accès du personnel de l'ENEAM.
        </p>
    </div>
@endsection
