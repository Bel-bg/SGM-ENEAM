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
        {{-- <form class="navbar-recherche" action="#" method="get">
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
        </form> --}}

        <nav class="navbar-actions">
            <a href="{{ route('catalogue-index') }}" class="navbar-lien">
                <span>Catalogue</span>
            </a>

            <a href="#" class="navbar-lien">
                <span>Comment ça marche ?</span>
            </a>

            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                >
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <a href="{{ route('logout') }}"         class="navbar-lien"  
                    onclick="event.preventDefault(); this.closest('form').submit();">
                        <span>Se Déconnecter</span>
                    </a>
                </form>
                        
            @else
                <a href="{{ route('login') }}" class="navbar-lien">
                    <span>Se Connecter</span>
                </a>
            @endauth
                    
            @if (request()->routeIs('catalogue-index'))
                <a href="#" class="btn-principal">Je suis Etudiant</a>
            @elseif (request()->routeIs('landing-index'))
                <a href="{{ route('register') }}" class="btn-principal">Espace Etudiant</a>
            @endif
        </nav>
    </div>
</header>
