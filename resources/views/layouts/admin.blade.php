<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Administration | [SGM]-ENEAM')</title>

    <link rel="preconnect" href="https://googleapis.com" />
    <link rel="preconnect" href="https://gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap" />
    <link rel="stylesheet" href="https://jsdelivr.net" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
</head>
<body>
    <div class="admin-layout">
        {{-- Sidebar réutilisable --}}
        @include('admin.includes.sidebar')

        {{-- Contenu principal --}}
        <div class="admin-main">
            <header class="admin-topbar">
                <h1 class="admin-topbar-titre">@yield('page-title', 'Tableau de bord')</h1>

                <div class="admin-topbar-user">
                    <div class="admin-avatar">
                        {{ substr(Auth::user()->prenom ?? Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div>
                        <div style="font-weight: 700; color: var(--texte-titre);">
                            {{ Auth::user()->prenom }} {{ Auth::user()->name }}
                        </div>
                        <div style="font-size: 12px; color: var(--texte-discret);">
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                </div>
            </header>

            <main class="admin-contenu">
                @if (session('status'))
                    <div class="connexion-info" style="margin-bottom: 20px;">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
