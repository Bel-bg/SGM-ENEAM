<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminInvitationMail;
use App\Models\Filiere;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AdminInvitationController extends Controller
{
    public function index()
    {
        if (! Auth::user()->hasRole('admin')) {
            abort(403, 'Action réservée à l’administrateur principal.');
        }

        $rolesAdmin = ['admin', 'chef_departement', 'bibliothecaire'];

        // Membres déjà inscrits et actifs
        $membres = User::with(['roles', 'filiere'])
            ->whereNull('invitation_token')
            ->whereHas('roles', fn($q) => $q->whereIn('nom', $rolesAdmin))
            ->latest()
            ->get();

        // Invitations envoyées en attente de finalisation
        $invitationsEnAttente = User::with(['roles', 'filiere'])
            ->whereNotNull('invitation_token')
            ->whereHas('roles', fn($q) => $q->whereIn('nom', $rolesAdmin))
            ->latest()
            ->get();

        $filieres = Filiere::orderBy('nom')->get();

        return view('admin.membres.index', compact('membres', 'invitationsEnAttente', 'filieres'));
    }

    public function store(Request $request)
    {
        if (! Auth::user()->hasRole('admin')) {
            abort(403);
        }

        $request->validate([
            'email'      => ['required', 'email'],
            'role'       => ['required', 'in:admin,chef_departement,bibliothecaire'],
            'filiere_id' => ['required_if:role,chef_departement', 'nullable', 'exists:filieres,id'],
        ], [
            'filiere_id.required_if' => 'Veuillez sélectionner la filière pour un Chef de département.',
        ]);

        $email = trim($request->email);
        $existant = User::where('email', $email)->first();

        // Vérifier s'il a déjà une invitation en attente ou un compte admin actif
        if ($existant) {
            if ($existant->invitation_token !== null) {
                return back()->withInput()->withErrors([
                    'email' => 'Une invitation est déjà en attente pour cette adresse. Utilisez le bouton « Renvoyer » ci-dessous.',
                ]);
            }

            if ($existant->hasAnyRole(['admin', 'chef_departement', 'bibliothecaire'])) {
                return back()->withInput()->withErrors([
                    'email' => 'Cet utilisateur fait déjà partie de l’administration.',
                ]);
            }

            return back()->withInput()->withErrors([
                'email' => 'Cette adresse e-mail est déjà utilisée par un compte étudiant.',
            ]);
        }

        $role = Role::firstOrCreate(['nom' => $request->role]);
        $token = Str::random(64);

        $invite = User::create([
            'email'            => $email,
            'filiere_id'       => $request->role === 'chef_departement' ? $request->filiere_id : null,
            'invitation_token' => $token,
        ]);

        $invite->roles()->syncWithoutDetaching([$role->id]);

        $this->envoyerMailInvitation($invite, $request->role, $token);

        return redirect()->route('admin.membres.index')
            ->with('status', 'Invitation envoyée avec succès à ' . $invite->email . ' !');
    }

    /**
     * Renvoyer l'e-mail d'une invitation en attente
     */
    public function resend(User $user)
    {
        if (! Auth::user()->hasRole('admin') || ! $user->invitation_token) {
            abort(403);
        }

        $roleNom = $user->roles->first()?->nom ?? 'bibliothecaire';
        $this->envoyerMailInvitation($user, $roleNom, $user->invitation_token);

        return redirect()->route('admin.membres.index')
            ->with('status', 'L’e-mail d’invitation a été renvoyé à ' . $user->email . '.');
    }

    /**
     * Annuler et supprimer une invitation en attente
     */
    public function destroy(User $user)
    {
        if (! Auth::user()->hasRole('admin') || ! $user->invitation_token) {
            abort(403);
        }

        $email = $user->email;
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.membres.index')
            ->with('status', 'L’invitation pour ' . $email . ' a été annulée.');
    }

    public function showRegisterForm(Request $request)
    {
        $token = $request->query('token');

        if (! $token) {
            abort(403, 'L’inscription publique est désactivée. Un lien d’invitation valide est requis.');
        }

        $invite = User::with(['roles', 'filiere'])
            ->where('invitation_token', $token)
            ->first();

        if (! $invite) {
            abort(403, 'Ce lien d’invitation est invalide ou a déjà été utilisé.');
        }

        return view('auth.register', compact('invite'));
    }

    public function completeRegistration(Request $request)
    {
        $request->validate([
            'token'    => ['required', 'string'],
            'name'     => ['required', 'string', 'max:255'],
            'prenom'   => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $invite = User::where('invitation_token', $request->token)->firstOrFail();

        $invite->update([
            'name'              => strtoupper(trim($request->name)),
            'prenom'            => trim($request->prenom),
            'password'          => Hash::make($request->password),
            'email_verified_at' => now(),
            'invitation_token'  => null,
        ]);

        Auth::login($invite);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('status', 'Bienvenue sur votre espace administration !');
    }

    private function envoyerMailInvitation(User $invite, string $roleNom, string $token): void
    {
        $labels = [
            'admin'            => 'Administrateur (Accès complet)',
            'chef_departement' => 'Chef de Département',
            'bibliothecaire'   => 'Bibliothécaire',
        ];

        $urlInscription = route('register', ['token' => $token]);

        Mail::to($invite->email)->send(
            new AdminInvitationMail($invite, $labels[$roleNom] ?? $roleNom, $urlInscription)
        );
    }
}
