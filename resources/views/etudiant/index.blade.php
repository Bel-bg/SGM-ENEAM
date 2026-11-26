<!DOCTYPE html>
<html lang="fr">
    @include('includes.head')
    <body>
        @include('includes.header')

        <main>
            <section class="recherche-page">
                <div style="max-width: var(--largeur-max); margin: 0 auto; padding: 40px 20px;">
                    <h1>Bienvenue dans votre espace, {{ Auth::user()->prenom }} {{ Auth::user()->name }}</h1>
                    <p>
                        Matricule : <strong>{{ Auth::user()->etudiant->matricule ?? 'N/A' }}</strong> |
                        Filière : <strong>{{ Auth::user()->etudiant->filiere ?? 'N/A' }}</strong>
                    </p>

                    {{-- Le reste de votre code étudiant ici --}}

                    <!-- Bouton de déconnexion -->
                    <div style="margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--separateur);">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-principal" style="background-color: #dc2626; border: none; cursor: pointer;">
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </main>

        @include('includes.footer')
    </body>
</html>
