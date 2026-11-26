<aside class="admin-sidebar">
    <div class="admin-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-logo">
            [SGM]-ENEAM
        </a>
        <span class="admin-sidebar-badge">
            @if(Auth::user()->hasRole('admin'))
                Administrateur
            @elseif(Auth::user()->hasRole('chef_departement'))
                Chef de Département
            @elseif(Auth::user()->hasRole('bibliothecaire'))
                Bibliothécaire
            @else
                Administration
            @endif
        </span>
    </div>

    <nav class="admin-sidebar-nav" aria-label="Navigation administration">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="admin-nav-lien {{ request()->routeIs('admin.dashboard') ? 'est-actif' : '' }}">
            <span class="admin-nav-lien-gauche">
                <i class="bi bi-house-door-fill nav-icone"></i>
                <span>Dashboard</span>
            </span>
        </a>

        <!-- Étudiants (Accès direct) -->
        <a href="#" class="admin-nav-lien">
            <span class="admin-nav-lien-gauche">
                <i class="bi bi-people-fill nav-icone"></i>
                <span>Étudiants</span>
            </span>
            <i class="bi bi-chevron-down nav-chevron"></i>
        </a>

        <!-- Mémoires (Menu déroulant) -->
        <div class="admin-nav-accordeon">
            <button type="button" class="admin-nav-lien" onclick="toggleAdminMenu(this)">
                <span class="admin-nav-lien-gauche">
                    <i class="bi bi-tag-fill nav-icone"></i>
                    <span>Mémoires</span>
                </span>
                <i class="bi bi-chevron-down nav-chevron"></i>
            </button>
            <ul class="admin-sous-menu">
                <li><a href="#" class="admin-sous-lien">À valider</a></li>
                <li><a href="#" class="admin-sous-lien">Archives publiées</a></li>
                <li><a href="{{ route('catalogue-index') }}" target="_blank" class="admin-sous-lien">Catalogue public</a></li>
            </ul>
        </div>

        <!-- Soutenances / Filières -->
        <div class="admin-nav-accordeon">
            <button type="button" class="admin-nav-lien" onclick="toggleAdminMenu(this)">
                <span class="admin-nav-lien-gauche">
                    <i class="bi bi-folder2-open nav-icone"></i>
                    <span>Filières &amp; Années</span>
                </span>
                <i class="bi bi-chevron-down nav-chevron"></i>
            </button>
            <ul class="admin-sous-menu">
                <li><a href="#" class="admin-sous-lien">Filières</a></li>
                <li><a href="#" class="admin-sous-lien">Années académiques</a></li>
            </ul>
        </div>

        <!-- Comptes (Ouvert par défaut ou sur les pages membres, identique à la maquette) -->
        <div class="admin-nav-accordeon {{ request()->routeIs('admin.membres.*') ? 'est-ouvert' : '' }}">
            <button type="button" class="admin-nav-lien" onclick="toggleAdminMenu(this)">
                <span class="admin-nav-lien-gauche">
                    <i class="bi bi-person-circle nav-icone"></i>
                    <span>Comptes</span>
                </span>
                <i class="bi bi-chevron-down nav-chevron"></i>
            </button>
            <ul class="admin-sous-menu">
                @if(Auth::user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin.membres.index') }}"
                           class="admin-sous-lien {{ request()->routeIs('admin.membres.*') ? 'est-actif' : '' }}">
                            Utilisateurs &amp; Invitations
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('profile.edit') }}" class="admin-sous-lien">
                        Mon profil
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="admin-sous-lien">
                            Se Déconnecter
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        function toggleAdminMenu(bouton) {
            const parent = bouton.closest('.admin-nav-accordeon');
            parent.classList.toggle('est-ouvert');
        }
    </script>
</aside>
