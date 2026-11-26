<?php

use App\Http\Controllers\Auth\EtudiantAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/* Routes Publiques */
Route::get('/', function () {
    return view('landing.index');
})->name('landing-index');

Route::get('/catalogue', function () {
    return view('catalogue.index');
})->name('catalogue-index');

Route::get('/catalogue/details', function () {
    return view('catalogue.details');
})->name('catalogue-details');

/* Authentification Étudiant (Invités uniquement) */
Route::middleware('guest')->prefix('etudiant')->name('etudiant.')->group(function () {
    // Étape 1 : Saisie du matricule
    Route::get('/login', [EtudiantAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [EtudiantAuthController::class, 'sendOtp'])->name('send-otp');

    // Étape 2 : Saisie du code de vérification (OTP)
    Route::get('/verify-otp', [EtudiantAuthController::class, 'showOtpForm'])->name('otp.form');
    Route::post('/verify-otp', [EtudiantAuthController::class, 'verifyOtp'])->name('otp.verify');
});

/*Espace Connecté (Étudiants & Administration)*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* Espace Connecté (Aiguillage & Dashboards par rôle)*/
Route::middleware('auth')->group(function () {
    
    // Aiguilleur central après connexion (Étudiant et Administration)
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->hasRole('etudiant')) {
            return redirect()->route('etudiant.dashboard');
        }

        if ($user->hasAnyRole(['admin', 'chef_departement', 'bibliothecaire'])) {
            return redirect()->route('admin.dashboard');
        }

        abort(403, 'Aucun rôle valide attribué à ce compte.');
    })->name('dashboard');

    // Espace Étudiant -> resources/views/etudiant/index.blade.php
    Route::prefix('espace-etudiant')->name('etudiant.')->group(function () {
        Route::get('/', function () {
            if (! Auth::user()->hasRole('etudiant')) {
                abort(403, 'Accès réservé aux étudiants.');
            }
            return view('etudiant.index');
        })->name('dashboard');
    });

    // Espace Administration -> resources/views/admin/index.blade.php
    Route::prefix('administration')->name('admin.')->group(function () {
        Route::get('/', function () {
            if (! Auth::user()->hasAnyRole(['admin', 'chef_departement', 'bibliothecaire'])) {
                abort(403, 'Accès réservé à l’administration.');
            }
            return view('admin.index');
        })->name('dashboard');
    });

    // Profil utilisateur (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
