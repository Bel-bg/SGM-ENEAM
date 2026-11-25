<main class="recherche-page">
            <div class="recherche-conteneur">
                <!-- Filtres -->
                <aside class="filtres-sidebar">
                    <div class="filtres-entete">
                        <span class="filtres-titre">Filtrer par</span>
                        <button type="button" class="btn-effacer">
                            Tout effacer
                        </button>
                    </div>

                    <div class="filtres-groupe">
                        <button type="button" class="filtre-select">
                            <span>Année (2025 - 2026)</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <button type="button" class="filtre-select">
                            <span>Cycle (Licence / Master)</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <button type="button" class="filtre-select">
                            <span>Département</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <button type="button" class="filtre-select">
                            <span>Mention / Note</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <button type="button" class="filtre-select">
                            <span>Langue</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </div>

                    <div class="filtres-categories">
                        <span class="filtres-sous-titre"
                            >Afficher par filière</span
                        >

                        <div class="categories-liste">
                            <button type="button" class="categorie-btn">
                                Informatique de Gestion (IG)
                            </button>
                            <button type="button" class="categorie-btn">
                                Statistique (ISE / ITS)
                            </button>
                            <button type="button" class="categorie-btn">
                                Planification du Développement
                            </button>
                            <button type="button" class="categorie-btn">
                                Gestion Financière et Comptable
                            </button>
                            <button type="button" class="categorie-btn">
                                Gestion des Banques et Assurances
                            </button>
                            <button type="button" class="categorie-btn">
                                Gestion Commerciale
                            </button>
                            <button type="button" class="categorie-btn">
                                Transport et Logistique
                            </button>
                            <button type="button" class="categorie-btn">
                                Gestion des Ressources Humaines
                            </button>
                            <button type="button" class="categorie-btn">
                                DECOGEF / DESCOGEF
                            </button>
                            <button type="button" class="categorie-btn">
                                Contrôle de Gestion et Audit
                            </button>
                        </div>
                    </div>
                </aside>

                <!-- Résultats -->
                <section class="resultats-contenu">
                    <div class="barre-test-local">
                    </div>

                    <!-- En-tête -->
                    <div class="resultats-entete">
                        <h1 class="resultats-compteur">
                            1 428 mémoires et thèses trouvés à l’ENEAM
                        </h1>

                        <div
                            class="affichage-modes"
                            role="group"
                            aria-label="Mode d'affichage"
                        >
                            <button
                                type="button"
                                class="mode-btn actif"
                                aria-label="Affichage en liste"
                            >
                                <i class="bi bi-list-ul"></i>
                            </button>

                            <button
                                type="button"
                                class="mode-btn"
                                aria-label="Affichage en grille"
                            >
                                <i class="bi bi-grid"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Liste des mémoires -->
                    <div class="documents-liste">
                        <!-- Mémoire 1 -->
                        <article class="doc-carte">
                            <a
                                href="{{ route('catalogue-details') }}"
                                class="doc-miniature"
                                target="_blank"
                            >
                                <span class="doc-badge">PDF</span>
                                <canvas
                                    class="pdf-couverture"
                                    data-pdf="docs/main.pdf"
                                ></canvas>
                            </a>

                            <div class="doc-infos">
                                <div class="doc-stats">
                                    214 vues • 68 pages • Licence Pro (IG)
                                </div>

                                <h2 class="doc-titre">
                                    <a href="{{ route('catalogue-details') }}" target="_blank">
                                        Conception et réalisation d'un système
                                        numérique d'archivage des mémoires de
                                        l'ENEAM
                                    </a>
                                </h2>

                                <p class="doc-auteur">
                                    Soutenu par
                                    <a href="#">Belmonde Fiodekanhoun</a> •
                                    Promotion 2025-2026
                                </p>
                            </div>

                            <div class="doc-actions">
                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Télécharger"
                                >
                                    <i class="bi bi-download"></i>
                                </button>

                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Enregistrer"
                                >
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            </div>
                        </article>

                        <!-- Mémoire 2 -->
                        <article class="doc-carte">
                            <a
                                href="{{ route('catalogue-details') }}"
                                class="doc-miniature"
                                target="_blank"
                            >
                                <span class="doc-badge">PDF</span>
                                <canvas
                                    class="pdf-couverture"
                                    data-pdf="docs/main.pdf"
                                ></canvas>
                            </a>

                            <div class="doc-infos">
                                <div class="doc-stats">
                                    489 vues • 82 pages • Master (GFC)
                                </div>

                                <h2 class="doc-titre">
                                    <a href="{{ route('catalogue-details') }}" target="_blank">
                                        Analyse de l'impact du digital banking
                                        sur la performance des banques
                                        commerciales au Bénin
                                    </a>
                                </h2>

                                <p class="doc-extrait">
                                    Ce mémoire étudie l'adoption des services
                                    financiers numériques et du Mobile Money par
                                    les établissements bancaires de la place de
                                    Cotonou, en évaluant leur rentabilité
                                    opérationnelle...
                                </p>

                                <p class="doc-auteur">
                                    Soutenu par <a href="#">Koffi Mensah</a> •
                                    Sous la direction de Dr. Maurice Comlan
                                    (Octobre 2025)
                                </p>
                            </div>

                            <div class="doc-actions">
                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Télécharger"
                                >
                                    <i class="bi bi-download"></i>
                                </button>

                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Enregistrer"
                                >
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            </div>
                        </article>

                        <!-- Mémoire 3 -->
                        <article class="doc-carte">
                            <a
                                href="{{ route('catalogue-details') }}"
                                class="doc-miniature"
                                target="_blank"
                            >
                                <span class="doc-badge">PDF</span>
                                <canvas
                                    class="pdf-couverture"
                                    data-pdf="docs/main.pdf"
                                ></canvas>
                            </a>

                            <div class="doc-infos">
                                <div class="doc-stats">
                                    312 vues • 74 pages • Licence Pro (GTL)
                                </div>

                                <h2 class="doc-titre">
                                    <a href="{{ route('catalogue-details') }}" target="_blank">
                                        Optimisation de la chaîne logistique
                                        portuaire et dématérialisation des
                                        procédures au Port Autonome de Cotonou
                                    </a>
                                </h2>

                                <p class="doc-auteur">
                                    Soutenu par <a href="#">Aïcha Dossou</a> •
                                    Promotion 2024-2025
                                </p>
                            </div>

                            <div class="doc-actions">
                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Télécharger"
                                >
                                    <i class="bi bi-download"></i>
                                </button>

                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Enregistrer"
                                >
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            </div>
                        </article>

                        <!-- Mémoire 4 -->
                        <article class="doc-carte">
                            <a
                                href="{{ route('catalogue-details') }}"
                                class="doc-miniature"
                                target="_blank"
                            >
                                <span class="doc-badge">PDF</span>
                                <canvas
                                    class="pdf-couverture"
                                    data-pdf="docs/main.pdf"
                                ></canvas>
                            </a>

                            <div class="doc-infos">
                                <div class="doc-stats">
                                    650 vues • 95 pages • Ingénieur Statisticien
                                    (ISE)
                                </div>

                                <h2 class="doc-titre">
                                    <a href="{{ route('catalogue-details') }}" target="_blank">
                                        Modélisation économétrique de
                                        l'inflation et croissance économique
                                        dans l'espace UEMOA
                                    </a>
                                </h2>

                                <p class="doc-auteur">
                                    Soutenu par
                                    <a href="#">Sègbégnon Houngbédji</a> •
                                    Bibliothèque ENEAM Gbégamey (2024)
                                </p>
                            </div>

                            <div class="doc-actions">
                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Télécharger"
                                >
                                    <i class="bi bi-download"></i>
                                </button>

                                <button
                                    type="button"
                                    class="doc-action-btn"
                                    aria-label="Enregistrer"
                                >
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </main>