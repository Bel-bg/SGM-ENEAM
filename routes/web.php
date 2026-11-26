<?php

use App\Http\Controllers\Admin\AdminInvitationController;
use App\Http\Controllers\Auth\EtudiantAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
})->name('landing-index');

Route::get('/catalogue', function () {
    return view('catalogue.index');
})->name('catalogue-index');

Route::get('/catalogue/details', function () {
    return view('catalogue.details');
})->name('catalogue-details');

Route::middleware('guest')->group(function () {
    Route::prefix('etudiant')->name('etudiant.')->group(function () {
        Route::get('/login', [EtudiantAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [EtudiantAuthController::class, 'sendOtp'])->name('send-otp');
        Route::get('/verify-otp', [EtudiantAuthController::class, 'showOtpForm'])->name('otp.form');
        Route::post('/verify-otp', [EtudiantAuthController::class, 'verifyOtp'])->name('otp.verify');
    });

    Route::get('/register', [AdminInvitationController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminInvitationController::class, 'completeRegistration'])->name('register.complete');
});

Route::middleware('auth')->group(function () {
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

    Route::prefix('espace-etudiant')->name('etudiant.')->group(function () {
        Route::get('/', function () {
            if (! Auth::user()->hasRole('etudiant')) {
                abort(403, 'Accès réservé aux étudiants.');
            }
            return view('etudiant.index');
        })->name('dashboard');
    });

    Route::prefix('administration')->name('admin.')->group(function () {
        Route::get('/', function () {
            if (! Auth::user()->hasAnyRole(['admin', 'chef_departement', 'bibliothecaire'])) {
                abort(403, 'Accès réservé à l’administration.');
            }
            return view('admin.index');
        })->name('dashboard');

        Route::get('/membres', [AdminInvitationController::class, 'index'])->name('membres.index');
        Route::post('/membres/inviter', [AdminInvitationController::class, 'store'])->name('membres.store');
        Route::post('/membres/invitations/{user}/renvoyer', [AdminInvitationController::class, 'resend'])->name('membres.resend');
        Route::delete('/membres/invitations/{user}', [AdminInvitationController::class, 'destroy'])->name('membres.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
