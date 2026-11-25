<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Connexion étudiant | SGM-ENEAM</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap"
        />
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">  

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
            <a href="{{ url('/') }}" class="connexion-retour">
                <svg
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Retour
            </a>

            <section class="connexion-boite">
                <h1 class="connexion-titre">Connexion Étudiant</h1>

                <ol class="connexion-etapes" aria-label="Étapes de connexion">
                    <li class="connexion-etape est-actif" aria-current="step">
                        <span class="connexion-etape-numero">1</span>
                        <span class="connexion-etape-nom">Matricule</span>
                    </li>

                    <li class="connexion-trait" aria-hidden="true"></li>

                    <li class="connexion-etape">
                        <span class="connexion-etape-numero">2</span>
                        <span class="connexion-etape-nom">Code</span>
                    </li>
                </ol>

                <h2 class="connexion-sous-titre">Entrez votre matricule</h2>

                @if (session('status'))
                    <p class="connexion-info" role="status">
                        {{ session('status') }}
                    </p>
                @endif

                <form method="POST" action="{{ route('etudiant.send-otp') }}" class="connexion-formulaire" novalidate>

                    @csrf

                    <div class="connexion-champ">
                        <label for="matricule" class="connexion-label">
                            Matricule étudiant
                        </label>
                        <input
                            type="text"
                            id="matricule"
                            name="matricule"
                            class="connexion-input @error('matricule') est-invalide @enderror"
                            value="{{ old('matricule') }}"
                            autocomplete="off"
                            autofocus
                            required
                            @error('matricule') aria-invalid="true" aria-describedby="matricule-erreur" @enderror
                        />

                        @error('matricule')
                            <p
                                id="matricule-erreur"
                                class="connexion-erreur"
                                role="alert"
                            >
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="connexion-bouton">
                        Envoyer le code
                    </button>
                </form>
            </section>
        </main>
    </body>
</html>