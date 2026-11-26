<header class="navbar">
    <div class="navbar-conteneur">
        <!-- Logo -->
        <a href="{{ route('landing-index') }}">
            <img
                src="{{ asset('assets/blank_background.png') }}"
                alt="Logo SGM-ENEAM"
                class="navbar-logo"
                width="300"
                height="50"
            />
        </a>

        <nav class="navbar-actions">
            <a href="{{ route('catalogue-index') }}" class="navbar-lien">
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
                <a href="{{ route('login') }}" class="navbar-lien">
                    <span>Se Connecter</span>
                </a>

                @if (request()->routeIs('catalogue-index'))
                    <a href="{{ route('etudiant.login') }}" class="btn-principal">
                        Je suis Étudiant
                    </a>
                @else
                    <a href="{{ route('etudiant.login') }}" class="btn-principal">
                        Espace Étudiant
                    </a>
                @endif
            @endauth
        </nav>
    </div>
</header>
