<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Inscription Administration | SGM-ENEAM</title>

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
            <a href="{{ route('login') }}" class="connexion-retour">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Retour à la connexion
            </a>

            <section class="connexion-boite">
                <h1 class="connexion-titre">Création de compte</h1>
                <h2 class="connexion-sous-titre">Complétez vos informations personnelles</h2>

                <form method="POST" action="{{ route('register') }}" class="connexion-formulaire" novalidate>
                    @csrf

                    <!-- Nom -->
                    <div class="connexion-champ">
                        <label for="name" class="connexion-label">
                            Nom
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="connexion-input @error('name') est-invalide @enderror"
                            value="{{ old('name') }}"
                            autocomplete="family-name"
                            autofocus
                            required
                        />

                        @error('name')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Prénom -->
                    <div class="connexion-champ">
                        <label for="prenom" class="connexion-label">
                            Prénom(s)
                        </label>
                        <input
                            type="text"
                            id="prenom"
                            name="prenom"
                            class="connexion-input @error('prenom') est-invalide @enderror"
                            value="{{ old('prenom') }}"
                            autocomplete="given-name"
                            required
                        />

                        @error('prenom')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Adresse Email -->
                    <div class="connexion-champ">
                        <label for="email" class="connexion-label">
                            Adresse e-mail
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="connexion-input @error('email') est-invalide @enderror"
                            value="{{ old('email') }}"
                            autocomplete="username"
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
                        <label for="password" class="connexion-label">
                            Mot de passe
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="connexion-input @error('password') est-invalide @enderror"
                            autocomplete="new-password"
                            required
                        />

                        @error('password')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="connexion-champ">
                        <label for="password_confirmation" class="connexion-label">
                            Confirmer le mot de passe
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="connexion-input @error('password_confirmation') est-invalide @enderror"
                            autocomplete="new-password"
                            required
                        />

                        @error('password_confirmation')
                            <p class="connexion-erreur" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="connexion-bouton">
                        Finaliser l'inscription
                    </button>
                </form>
            </section>
        </main>
    </body>
</html>
