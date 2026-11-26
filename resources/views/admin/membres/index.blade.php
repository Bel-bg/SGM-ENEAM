@extends('layouts.admin')

@section('title', 'Membres & Invitations | [SGM]-ENEAM')
@section('page-title', 'Membres de l’administration & Invitations')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <p style="margin: 0; color: var(--texte-discret); font-size: 14px;">
            Gérez les accès des administrateurs, chefs de département et bibliothécaires.
        </p>

        <button type="button"
                onclick="document.getElementById('bloc-invitation').style.display = 'block'"
                class="btn-principal"
                style="border: none; cursor: pointer;">
            + Nouveau membre
        </button>
    </div>

    <!-- Formulaire d'invitation -->
    <div id="bloc-invitation"
         class="admin-carte"
         style="margin-bottom: 28px; display: {{ $errors->any() ? 'block' : 'none' }};">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 16px; font-weight: 700; margin: 0;">Inviter un nouveau membre</h2>
            <button type="button"
                    onclick="document.getElementById('bloc-invitation').style.display = 'none'"
                    style="background: none; border: none; font-size: 18px; cursor: pointer; color: var(--texte-discret);">
                &times;
            </button>
        </div>

        <form method="POST" action="{{ route('admin.membres.store') }}">
            @csrf

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 20px;">
                <div>
                    <label for="email" class="connexion-label">Adresse e-mail professionnelle</label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="connexion-input @error('email') est-invalide @enderror"
                           placeholder="collegue@eneam.uac.bj"
                           required>
                    @error('email')
                        <p class="connexion-erreur">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="connexion-label">Rôle attribué</label>
                    <select id="role"
                            name="role"
                            class="connexion-input @error('role') est-invalide @enderror"
                            onchange="toggleFiliereSelect(this.value)"
                            required>
                        <option value="">-- Choisir un rôle --</option>
                        <option value="bibliothecaire" {{ old('role') === 'bibliothecaire' ? 'selected' : '' }}>Bibliothécaire</option>
                        <option value="chef_departement" {{ old('role') === 'chef_departement' ? 'selected' : '' }}>Chef de Département</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrateur (Tous les droits)</option>
                    </select>
                    @error('role')
                        <p class="connexion-erreur">{{ $message }}</p>
                    @enderror
                </div>

                <div id="champ-filiere" style="display: {{ old('role') === 'chef_departement' ? 'block' : 'none' }};">
                    <label for="filiere_id" class="connexion-label">Filière rattachée</label>
                    <select id="filiere_id"
                            name="filiere_id"
                            class="connexion-input @error('filiere_id') est-invalide @enderror">
                        <option value="">-- Sélectionner une filière --</option>
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                                {{ $filiere->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('filiere_id')
                        <p class="connexion-erreur">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="connexion-bouton" style="max-width: 240px;">
                Envoyer l'invitation par mail
            </button>
        </form>
    </div>

    <!-- Section 1 : Invitations en attente -->
    <div class="admin-carte" style="margin-bottom: 28px; overflow-x: auto;">
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px;">
            <h2 style="font-size: 16px; font-weight: 700; margin: 0;">Invitations en attente</h2>
            <span style="background: #fef3c7; color: #92400e; padding: 2px 10px; border-radius: 99px; font-size: 12px; font-weight: 700;">
                {{ $invitationsEnAttente->count() }}
            </span>
        </div>

        @if($invitationsEnAttente->isEmpty())
            <p style="margin: 0; font-size: 13.5px; color: var(--texte-discret);">
                Aucune invitation en attente pour le moment.
            </p>
        @else
            <table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--separateur); color: var(--texte-discret);">
                        <th style="padding: 12px;">Email invité</th>
                        <th style="padding: 12px;">Rôle</th>
                        <th style="padding: 12px;">Filière</th>
                        <th style="padding: 12px;">Envoyée le</th>
                        <th style="padding: 12px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invitationsEnAttente as $invitation)
                        <tr style="border-bottom: 1px solid var(--separateur);">
                            <td style="padding: 12px; font-weight: 600;">{{ $invitation->email }}</td>
                            <td style="padding: 12px;">{{ $invitation->roles->pluck('nom')->join(', ') }}</td>
                            <td style="padding: 12px;">{{ $invitation->filiere->nom ?? '—' }}</td>
                            <td style="padding: 12px; color: var(--texte-discret); font-size: 13px;">
                                {{ $invitation->created_at->format('d/m/Y à H:i') }}
                            </td>
                            <td style="padding: 12px; text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <form method="POST" action="{{ route('admin.membres.resend', $invitation) }}">
                                        @csrf
                                        <button type="submit"
                                                style="background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;">
                                            <i class="bi bi-send"></i> Renvoyer
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.membres.destroy', $invitation) }}" onsubmit="return confirm('Annuler cette invitation ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;">
                                            <i class="bi bi-trash"></i> Annuler
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Section 2 : Membres actifs -->
    <div class="admin-carte" style="overflow-x: auto;">
        <h2 style="font-size: 16px; font-weight: 700; margin: 0 0 16px;">Membres actifs de l'administration</h2>

        <table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left;">
            <thead>
                <tr style="border-bottom: 1px solid var(--separateur); color: var(--texte-discret);">
                    <th style="padding: 12px;">Nom &amp; Prénom</th>
                    <th style="padding: 12px;">Email</th>
                    <th style="padding: 12px;">Rôle</th>
                    <th style="padding: 12px;">Filière</th>
                    <th style="padding: 12px;">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($membres as $membre)
                    <tr style="border-bottom: 1px solid var(--separateur);">
                        <td style="padding: 12px; font-weight: 600;">
                            {{ $membre->prenom }} {{ $membre->name }}
                        </td>
                        <td style="padding: 12px;">{{ $membre->email }}</td>
                        <td style="padding: 12px;">{{ $membre->roles->pluck('nom')->join(', ') }}</td>
                        <td style="padding: 12px;">{{ $membre->filiere->nom ?? '—' }}</td>
                        <td style="padding: 12px;">
                            <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 99px; font-size: 12px; font-weight: 600;">
                                Actif
                            </span>
                    @endforeach
<script>
                    function toggleFiliereSelect(role) {
                    const champFiliere = document.getElementById('champ-filiere');
                    champFiliere.style.display = (role === 'chef_departement') ? 'block' : 'none';
                    }
                    </script>
