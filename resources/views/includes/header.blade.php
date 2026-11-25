        <header class="navbar">
            <div class="navbar-conteneur">
                <!-- Logo -->
                <img
    src="{{ asset('assets/blank_background.png') }}"
    class="navbar-logo"
    width="300"
    height="50"
/>


                <!-- Barre de recherche -->
                <form class="navbar-recherche" action="#" method="get">
                    <input
                        type="search"
                        placeholder="Trouver un mémoire"
                        aria-label="Trouver un mémoire"
                    />
                    <button type="submit" aria-label="Rechercher">
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
                <!-- Actions à droite -->
                <nav class="navbar-actions">
                    <a href="./catalogue.html" class="navbar-lien">
                        <span>Catalogue</span>
                    </a>
                    <a href="#" class="navbar-lien">
                        <span>Comment ça marche ?</span>
                    </a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-principal">
                            Dashboard
                        </a>
                    @else
                        @if (Route::has('etudiant.login'))
                            <a href="{{ route('etudiant.login') }}" class="btn-principal">
                                Espace Étudiant
                            </a>
                        @endif
                    @endauth
                </nav>

            </div>
        </header>