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
        <span class="admin-nav-groupe">Général</span>

        <a href="{{ route('admin.dashboard') }}"
           class="admin-nav-lien {{ request()->routeIs('admin.dashboard') ? 'est-actif' : '' }}">
            <i class="bi bi-grid-1x2"></i>
            <span>Tableau de bord</span>
        </a>

        <a href="{{ route('catalogue-index') }}" class="admin-nav-lien" target="_blank">
            <i class="bi bi-journal-bookmark"></i>
            <span>Voir le catalogue public</span>
        </a>

        <span class="admin-nav-groupe">Gestion des Mémoires</span>

        <a href="#" class="admin-nav-lien">
            <i class="bi bi-file-earmark-check"></i>
            <span>Mémoires à valider</span>
        </a>

        <a href="#" class="admin-nav-lien">
            <i class="bi bi-archive"></i>
            <span>Archives &amp; Publications</span>
        </a>

        @if(Auth::user()->hasRole('admin'))
            <span class="admin-nav-groupe">Administration Système</span>

            <a href="#" class="admin-nav-lien">
                <i class="bi bi-person-plus"></i>
                <span>Membres &amp; Invitations</span>
            </a>

            <a href="#" class="admin-nav-lien">
                <i class="bi bi-mortarboard"></i>
                <span>Base Étudiants</span>
            </a>
        @endif
    </nav>

    <div class="admin-sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-btn-logout">
                <i class="bi bi-box-arrow-left"></i>
                <span>Se déconnecter</span>
            </button>
        </form>
    </div>
</aside>
