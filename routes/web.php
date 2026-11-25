<?php

use App\Http\Controllers\Auth\EtudiantAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Routes Publiques
*/
Route::get('/', function () {
    return view('landing.index');
})->name('home');

/*Authentification Étudiant (Invités uniquement)
*/
Route::middleware('guest')->prefix('etudiant')->name('etudiant.')->group(function () {
    // Étape 1 : Saisie du matricule
    Route::get('/login', [EtudiantAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [EtudiantAuthController::class, 'sendOtp'])->name('send-otp');

    // Étape 2 : Saisie du code de vérification (OTP)
    Route::get('/verify-otp', [EtudiantAuthController::class, 'showOtpForm'])->name('otp.form');
    Route::post('/verify-otp', [EtudiantAuthController::class, 'verifyOtp'])->name('otp.verify');
});

/*
| Espace Connecté (Étudiants & Administration)
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
