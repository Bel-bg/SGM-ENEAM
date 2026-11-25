<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Vérification du code | SGM-ENEAM</title>

        <link rel="preconnect" href="https://googleapis.com" />
        <link rel="preconnect" href="https://gstatic.com" crossorigin />
        <link
            rel="stylesheet"
            href="https://googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap"
        />
        <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    </head>

    <body class="connexion-page">
        <aside class="connexion-visuel">
            <img
                src="{{ asset('assets/login.jpg') }}"
                alt=""
                class="connexion-visuel-image"
            />

            <div class="connexion-visuel-texte">
                <h2>
                    ÉCOLE NATIONALE D'ÉCONOMIE APPLIQUÉE ET DE MANAGEMENT
                    (ENEAM)
                </h2>
                <p class="connexion-visuel-sous-titre">
                    Système de Gestion des Mémoires
                </p>
                <p class="connexion-visuel-copyright">
                    © ENEAM {{ now()->year }} - Tous droits réservés
                </p>
            </div>
        </aside>

        <main class="connexion-contenu">
            <a href="{{ route('etudiant.login') }}" class="connexion-retour">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Changer de matricule
            </a>

            <section class="connexion-boite">
                <h1 class="connexion-titre">Connexion Étudiant</h1>

                <ol class="connexion-etapes" aria-label="Étapes de connexion">
                    <li class="connexion-etape">
                        <span class="connexion-etape-numero">1</span>
                        <span class="connexion-etape-nom">Matricule</span>
                    </li>

                    <li class="connexion-trait" aria-hidden="true"></li>

                    <li class="connexion-etape est-actif" aria-current="step">
                        <span class="connexion-etape-numero">2</span>
                        <span class="connexion-etape-nom">Code</span>
                    </li>
                </ol>

                <h2 class="connexion-sous-titre">Entrez le code reçu par e-mail</h2>

                @if (session('status'))
                    <p class="connexion-info" role="status">
                        {{ session('status') }}
                    </p>
                @endif

                <form method="POST" action="{{ route('etudiant.otp.verify') }}" class="connexion-formulaire" novalidate>
                    @csrf

                    <div class="connexion-champ">
                        <label for="code" class="connexion-label">
                            Code à 6 chiffres
                        </label>
                        <input
                            type="text"
                            id="code"
                            name="code"
                            maxlength="6"
                            inputmode="numeric"
                            class="connexion-input @error('code') est-invalide @enderror"
                            placeholder="Ex: 482910"
                            autocomplete="one-time-code"
                            autofocus
                            required
                        />

                        @error('code')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="connexion-bouton">
                        Valider et se connecter
                    </button>
                </form>
            </section>
        </main>
    </body>
</html>
