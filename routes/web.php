<?php

use App\Http\Controllers\Auth\EtudiantAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Routes Publiques
*/
Route::get('/', function () {
    return view('landing.index');
})->name('landing-index');

Route::get('catalogue', function() {
    return view('catalogue.index');
})->name('catalogue-index');

Route::get('catalogue/details', function() {
    return view('catalogue.details');
})->name('catalogue-details');

    // Étape 2 : Saisie du code de vérification (OTP)
    Route::get('/verify-otp', [EtudiantAuthController::class, 'showOtpForm'])->name('otp.form');
    Route::post('/verify-otp', [EtudiantAuthController::class, 'verifyOtp'])->name('otp.verify');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
