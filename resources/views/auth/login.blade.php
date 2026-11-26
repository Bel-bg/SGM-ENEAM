<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Connexion Administration | SGM-ENEAM</title>

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
                alt="Campus ENEAM"
                class="connexion-visuel-image"
            />

            <div class="connexion-visuel-texte">
                <h2>
                    ÉCOLE NATIONALE D'ÉCONOMIE APPLIQUÉE ET DE MANAGEMENT
                    (ENEAM)
                </h2>
                <p class="connexion-visuel-sous-titre">
                    Système de Gestion des Mémoires - Espace Administration
                </p>
                <p class="connexion-visuel-copyright">
                    © ENEAM {{ now()->year }} - Tous droits réservés
                </p>
            </div>
        </aside>

        <main class="connexion-contenu">
            <a href="{{ url('/') }}" class="connexion-retour">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Retour à l'accueil
            </a>

            <section class="connexion-boite">
                <h1 class="connexion-titre">Connexion Administration</h1>
                <h2 class="connexion-sous-titre">Accès réservé au personnel habilité</h2>

                @if (session('status'))
                    <p class="connexion-info" role="status">
                        {{ session('status') }}
                    </p>
                @endif

                <form method="POST" action="{{ route('login') }}" class="connexion-formulaire" novalidate>
                    @csrf

                    <!-- Adresse Email -->
                    <div class="connexion-champ">
                        <label for="email" class="connexion-label">
                            Adresse e-mail professionnelle
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="connexion-input @error('email') est-invalide @enderror"
                            value="{{ old('email') }}"
                            placeholder="nom@eneam.uac.bj"
                            autocomplete="username"
                            autofocus
                            required
                        />

                        @error('email')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="connexion-champ">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <label for="password" class="connexion-label" style="margin-bottom: 0;">
                                Mot de passe
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="font-size: 12px; color: var(--bleu-bouton); text-decoration: none; font-weight: 600;">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="connexion-input @error('password') est-invalide @enderror"
                            autocomplete="current-password"
                            required
                        />

                        @error('password')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Se souvenir de moi -->
                    <div class="connexion-champ" style="display: flex; align-items: center; gap: 8px;">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            style="width: 16px; height: 16px; accent-color: var(--bleu-bouton); cursor: pointer;"
                        />
                        <label for="remember_me" style="font-size: 13px; color: var(--texte-discret); cursor: pointer;">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit" class="connexion-bouton">
                        Se connecter
                    </button>
                </form>
            </section>
        </main>
    </body>
</html>
