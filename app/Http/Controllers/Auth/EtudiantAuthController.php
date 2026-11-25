<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EtudiantAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.etudiant-login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'matricule' => ['required', 'string'],
        ], [
            'matricule.required' => 'Veuillez saisir votre matricule.',
        ]);

        // Recherche via le modèle Etudiant et chargement du compte User lié
        $etudiant = Etudiant::with('user')
            ->where('matricule', trim($request->matricule))
            ->first();

        $user = $etudiant?->user;

        if (! $etudiant || ! $user || ! $user->hasRole('etudiant')) {
            return back()
                ->withInput()
                ->withErrors(['matricule' => 'Aucun étudiant trouvé avec ce matricule.']);
        }

        // Génération du code à 6 chiffres (valide 10 minutes)
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Envoi de l'e-mail
        Mail::to($user->email)->send(new VerificationCodeMail($code, $user));

        // Stockage du matricule en session pour l'étape 2
        session(['etudiant_matricule_otp' => $etudiant->matricule]);

        return redirect()->route('etudiant.otp.form')
            ->with('status', 'Un code de vérification a été envoyé à votre adresse e-mail (' . $this->masquerEmail($user->email) . ').');
    }

    public function showOtpForm()
    {
        if (! session()->has('etudiant_matricule_otp')) {
            return redirect()->route('etudiant.login');
        }

        return view('auth.etudiant-verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'code' => ['required', 'digits:6'],
        ], [
            'code.required' => 'Veuillez entrer le code reçu par e-mail.',
            'code.digits' => 'Le code doit contenir exactement 6 chiffres.',
        ]);

        $matricule = session('etudiant_matricule_otp');

        if (! $matricule) {
            return redirect()->route('etudiant.login')
                ->withErrors(['matricule' => 'Votre session a expiré. Veuillez recommencer.']);
        }

        $etudiant = Etudiant::with('user')->where('matricule', $matricule)->first();
        $user = $etudiant?->user;

        if (! $user || $user->otp_code !== $request->code || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['code' => 'Code invalide ou expiré.']);
        }

        // Nettoyage du code OTP et de la session
        $user->update([
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);
        session()->forget('etudiant_matricule_otp');

        // Connexion officielle via Laravel Breeze
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    private function masquerEmail(string $email): string
    {
        [$nom, $domaine] = explode('@', $email);
        $debut = substr($nom, 0, 2);
        return $debut . str_repeat('*', max(strlen($nom) - 2, 3)) . '@' . $domaine;
    }
}
