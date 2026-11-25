<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            Conception et réalisation d'un système numérique d'archivage des
            mémoires de l'ENEAM | [SGM]-ENEAM
        </title>

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
        <!-- Navbar + footer partagés avec le catalogue -->
        <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    </head>

    <body class="dt-page-detail">
        <!-- Barre de navigation (identique au catalogue) -->

        @include('includes.header')

        <p class="dt-message-impression">
            L'impression et l'export de ce mémoire ne sont pas autorisés.
        </p>

        <main class="dt-layout">
            <section class="dt-principal">
                <!-- En-tête du document -->
                <div class="dt-entete">
                    <div>
                        <h1 class="dt-titre">
                            Conception et réalisation d'un système numérique
                            d'archivage des mémoires de l'ENEAM
                        </h1>
                        <div class="dt-meta">
                            <span
                                ><i class="bi bi-hand-thumbs-up"></i>0
                                évaluation</span
                            >
                            <span class="dt-point">214 vues</span>
                            <span class="dt-point" id="meta-pages"
                                >68 pages</span
                            >
                        </div>
                        <a href="#" class="dt-lien-infos"
                            >Informations du document</a
                        >
                        <p class="dt-transfert">
                            Soutenu par <a href="#">Belmonde Fiodekanhoun</a> •
                            Licence Pro (IG) • Promotion 2025-2026
                        </p>
                    </div>

                    <div class="dt-reactions">
                        <button
                            type="button"
                            class="dt-icone-btn"
                            aria-label="J'aime"
                        >
                            <i class="bi bi-hand-thumbs-up"></i>
                        </button>
                        <button
                            type="button"
                            class="dt-icone-btn"
                            aria-label="Je n'aime pas"
                        >
                            <i class="bi bi-hand-thumbs-down"></i>
                        </button>
                        <button
                            type="button"
                            class="dt-icone-btn"
                            aria-label="Signaler"
                        >
                            <i class="bi bi-flag"></i>
                        </button>
                    </div>
                </div>

                <!-- Actions : aucun téléchargement possible -->
                <div class="dt-actions">
                    <a
                        href="connexion.html?redirect={{ route('catalogue-details')  }}"
                        class="dt-btn-vert"
                        id="btn-principal"
                    >
                        <span>Se connecter pour lire</span>
                    </a>
                    <button
                        type="button"
                        class="dt-outil-nu"
                        aria-label="Enregistrer"
                    >
                        <i class="bi bi-bookmark"></i>
                    </button>
                    <button
                        type="button"
                        class="dt-outil-nu"
                        aria-label="Partager"
                        id="btn-partager"
                    >
                        <i class="bi bi-share"></i>
                    </button>
                    <button
                        type="button"
                        class="dt-outil-nu dt-plein-ecran"
                        aria-label="Plein écran"
                        id="btn-plein-ecran"
                    >
                        <i class="bi bi-fullscreen"></i>
                    </button>
                </div>

                <!-- Visionneuse -->
                <div class="dt-visionneuse" id="visionneuse">
                    <div class="dt-outils">
                        <button
                            type="button"
                            class="dt-outil"
                            id="btn-recherche"
                            aria-label="Rechercher dans le document"
                        >
                            <i class="bi bi-search"></i>
                        </button>
                        <div class="dt-sep"></div>
                        <button
                            type="button"
                            class="dt-outil"
                            id="btn-precedent"
                            aria-label="Page précédente"
                        >
                            <i class="bi bi-chevron-up"></i>
                        </button>
                        <input
                            type="number"
                            class="dt-page-input"
                            id="page-courante"
                            value="1"
                            min="1"
                            aria-label="Numéro de page"
                        />
                        <span class="dt-total" id="page-total">68</span>
                        <button
                            type="button"
                            class="dt-outil"
                            id="btn-suivant"
                            aria-label="Page suivante"
                        >
                            <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="dt-sep"></div>
                        <button
                            type="button"
                            class="dt-outil"
                            id="btn-zoom-moins"
                            aria-label="Zoom arrière"
                        >
                            <i class="bi bi-zoom-out"></i>
                        </button>
                        <button
                            type="button"
                            class="dt-outil"
                            id="btn-zoom-plus"
                            aria-label="Zoom avant"
                        >
                            <i class="bi bi-zoom-in"></i>
                        </button>
                    </div>

                    <div class="dt-defilement" id="defilement">
                        <div class="dt-pages" id="pages"></div>
                    </div>
                </div>
            </section>

            <!-- Suggestions -->
            <aside class="dt-suggestions">
                <h2>Vous aimerez peut-être aussi</h2>

                <a href="{{ route('catalogue-details')  }}" class="dt-suggestion">
                    <div class="dt-vignette">
                        <span class="dt-badge">PDF</span
                        ><canvas data-pdf="docs/main.pdf"></canvas>
                    </div>
                    <div class="dt-sug-infos">
                        <span>489 vues</span>
                        <p class="dt-sug-titre">
                            Analyse de l'impact du digital banking sur la
                            performance des banques au Bénin
                        </p>
                        <span class="dt-sug-pages">82 pages</span>
                    </div>
                </a>
                <a href="{{ route('catalogue-details')  }}" class="dt-suggestion">
                    <div class="dt-vignette">
                        <span class="dt-badge">PDF</span
                        ><canvas data-pdf="docs/main.pdf"></canvas>
                    </div>
                    <div class="dt-sug-infos">
                        <span>312 vues</span>
                        <p class="dt-sug-titre">
                            Optimisation de la chaîne logistique portuaire au
                            Port Autonome de Cotonou
                        </p>
                        <span class="dt-sug-pages">74 pages</span>
                    </div>
                </a>
                <a href="{{ route('catalogue-details')  }}" class="dt-suggestion">
                    <div class="dt-vignette">
                        <span class="dt-badge">PDF</span
                        ><canvas data-pdf="docs/main.pdf"></canvas>
                    </div>
                    <div class="dt-sug-infos">
                        <span>650 vues</span>
                        <p class="dt-sug-titre">
                            Modélisation économétrique de l'inflation dans
                            l'espace UEMOA
                        </p>
                        <span class="dt-sug-pages">95 pages</span>
                    </div>
                </a>
                <a href="{{ route('catalogue-details')  }}" class="dt-suggestion">
                    <div class="dt-vignette">
                        <span class="dt-badge">PDF</span
                        ><canvas data-pdf="docs/main.pdf"></canvas>
                    </div>
                    <div class="dt-sug-infos">
                        <span>201 vues</span>
                        <p class="dt-sug-titre">
                            Mise en place d'un tableau de bord RH pour les PME
                            de Cotonou
                        </p>
                        <span class="dt-sug-pages">61 pages</span>
                    </div>
                </a>
            </aside>
        </main>

        <!-- Pied de page -->
        <footer class="footer">
            <div class="footer-conteneur">
                <div class="footer-colonnes">
                    <div class="footer-col">
                        <h3>ENEAM</h3>
                        <ul>
                            <li><a href="#">Historique</a></li>
                            <li><a href="#">Mission</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Les départements</a></li>
                            <li><a href="#">Bibliothèque</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h3>LIENS RAPIDES</h3>
                        <ul>
                            <li><a href="#">Cream</a></li>
                            <li><a href="#">Publications</a></li>
                            <li><a href="#">Doctorants</a></li>
                            <li><a href="#">Frais de mémoires</a></li>
                            <li><a href="#">Dépôt de mémoires</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h3>AUTRES LIENS</h3>
                        <ul>
                            <li><a href="#">UAC</a></li>
                            <li><a href="#">Club des Alumni</a></li>
                            <li><a href="#">E-learning</a></li>
                            <li><a href="#">Nos partenaires</a></li>
                            <li><a href="#">Bue &amp; Bcs</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h3>CONTACTS</h3>
                        <ul>
                            <li>03BP 1079 - Gbégamey</li>
                            <li>Cotonou - Bénin</li>
                            <li>
                                <a href="tel:+22921304168"
                                    >Tél : +229-21-30-41-68</a
                                >
                            </li>
                            <li>
                                <a href="mailto:eneam.uac@eneam.uac.bj"
                                    >Email : eneam.uac@eneam.uac.bj</a
                                >
                            </li>
                            <li><a href="#">Localisation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bas">
                    <div class="footer-reseaux">
                        <p class="footer-reseaux-titre">
                            Suivez-nous sur les réseaux sociaux !
                        </p>
                        <div class="footer-icones">
                            <a href="#" aria-label="Facebook ENEAM"
                                ><i class="bi bi-facebook"></i
                            ></a>
                            <a href="#" aria-label="Instagram ENEAM"
                                ><i class="bi bi-instagram"></i
                            ></a>
                            <a href="#" aria-label="Twitter ENEAM"
                                ><i class="bi bi-twitter-x"></i
                            ></a>
                        </div>
                    </div>
                    <p class="footer-copyright">
                        © 2026 | [SGM]-ENEAM | Tous droits réservés.
                    </p>
                </div>
            </div>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        <script>
            pdfjsLib.GlobalWorkerOptions.workerSrc =
                "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";

            /* =====================================================
               CONFIGURATION
               ESTCONNECTE : à remplacer par l'état réel de la session
               (cookie / API). Pour tester : {{ route('catalogue-details')  }}?connecte=1
               ===================================================== */
            const SOURCE_PDF = "docs/main.pdf";
            const PAGES_LIBRES = 1; // pages lisibles sans connexion
            const PAGES_FLOUES = 1; // pages floutées affichées derrière le mur
            const ESTCONNECTE =
                new URLSearchParams(location.search).get("connecte") === "1";

            const $ = (id) => document.getElementById(id);
            const conteneur = $("pages");
            const defilement = $("defilement");
            const champPage = $("page-courante");

            let pdf = null;
            let totalPages = 68; // valeur de secours si le PDF est illisible
            let ratio = 1.414; // hauteur / largeur (A4 par défaut)
            let zoom = 1;
            const feuilles = [];

            /* ---------- Dessin d'une page ---------- */
            async function dessinerPage(numero, canvas, largeurCible) {
                if (!pdf) return dessinerSecours(numero, canvas, largeurCible);
                const page = await pdf.getPage(numero);
                const base = page.getViewport({ scale: 1 });
                const scale = largeurCible / base.width;
                const vp = page.getViewport({ scale });
                canvas.width = Math.floor(vp.width);
                canvas.height = Math.floor(vp.height);
                await page.render({
                    canvasContext: canvas.getContext("2d"),
                    viewport: vp,
                }).promise;
            }

            // Page de démonstration quand le PDF n'est pas accessible
            function dessinerSecours(numero, canvas, largeur) {
                canvas.width = largeur;
                canvas.height = Math.floor(largeur * ratio);
                const c = canvas.getContext("2d");
                c.fillStyle = "#fff";
                c.fillRect(0, 0, canvas.width, canvas.height);
                c.fillStyle = "#151515";
                c.font = `bold ${largeur * 0.035}px serif`;
                c.textAlign = "center";
                c.fillText(
                    numero === 1 ? "MÉMOIRE DE FIN DE CYCLE" : "Page " + numero,
                    largeur / 2,
                    largeur * 0.25,
                );
                c.fillStyle = "#c9c9c9";
                for (
                    let y = largeur * 0.4;
                    y < canvas.height - 60;
                    y += largeur * 0.045
                ) {
                    c.fillRect(
                        largeur * 0.12,
                        y,
                        largeur * (0.5 + 0.3 * Math.abs(Math.sin(y + numero))),
                        6,
                    );
                }
            }

            /* Page floutée : rendue en TRÈS basse résolution (≈ 40 px).
               Le détail du texte n'existe plus dans les pixels :
               retirer le flou dans le navigateur ne révèle rien. */
            async function dessinerFloue(numero, canvas) {
                await dessinerPage(numero, canvas, 40);
            }

            /* ---------- Construction ---------- */
            function creerFeuille(numero, floue) {
                const div = document.createElement("div");
                div.className = "dt-feuille" + (floue ? " est-floue" : "");
                div.dataset.n = numero;
                div.style.aspectRatio = `1 / ${ratio}`;
                const canvas = document.createElement("canvas");
                div.appendChild(canvas);
                conteneur.appendChild(div);
                feuilles.push(div);
                return { div, canvas };
            }

            async function init() {
                try {
                    pdf = await pdfjsLib.getDocument(SOURCE_PDF).promise;
                    totalPages = pdf.numPages;
                    const p1 = await pdf.getPage(1);
                    const v = p1.getViewport({ scale: 1 });
                    ratio = v.height / v.width;
                } catch (e) {
                    console.warn("PDF indisponible, mode démo :", e);
                }

                $("page-total").textContent = totalPages;
                $("meta-pages").textContent = totalPages + " pages";
                champPage.max = totalPages;

                const largeur =
                    Math.min(900, conteneur.clientWidth || 780) * 1.5;

                if (ESTCONNECTE) {
                    // Lecture complète, rendu paresseux au défilement
                    const obs = new IntersectionObserver(
                        (entrees) => {
                            entrees.forEach((en) => {
                                if (!en.isIntersecting) return;
                                obs.unobserve(en.target);
                                dessinerPage(
                                    +en.target.dataset.n,
                                    en.target.querySelector("canvas"),
                                    largeur,
                                );
                            });
                        },
                        { root: defilement, rootMargin: "600px 0px" },
                    );
                    for (let n = 1; n <= totalPages; n++) {
                        obs.observe(creerFeuille(n, false).div);
                    }
                    const bouton = $("btn-principal");
                    bouton.className = "dt-btn-vert est-lecture";
                    bouton.removeAttribute("href");
                    bouton.innerHTML =
                        '<i class="bi bi-eye"></i><span>Lecture seule</span>';
                    $("lien-connexion").querySelector("span").textContent =
                        "Mon compte";
                } else {
                    // Visiteur : 2 pages nettes, quelques pages floues, puis le mur
                    const nettes = Math.min(PAGES_LIBRES, totalPages);
                    for (let n = 1; n <= nettes; n++) {
                        const f = creerFeuille(n, false);
                        dessinerPage(n, f.canvas, largeur);
                    }
                    const floues = Math.min(totalPages, nettes + PAGES_FLOUES);
                    for (let n = nettes + 1; n <= floues; n++) {
                        const f = creerFeuille(n, true);
                        dessinerFloue(n, f.canvas);
                    }
                    if (totalPages > nettes) {
                        const mur = $("mur");
                        mur.hidden = false;
                        defilement.appendChild(mur);
                    }
                }
                suivrePage();
            }

            /* ---------- Navigation ---------- */
            function allerA(n) {
                n = Math.max(1, Math.min(totalPages, n));
                const cible = feuilles.find((f) => +f.dataset.n === n);
                if (cible) {
                    defilement.scrollTo({ top: cible.offsetTop - 12 });
                } else if (!ESTCONNECTE) {
                    $("mur").scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                }
                champPage.value = n;
            }

            function suivrePage() {
                const haut = defilement.scrollTop + defilement.clientHeight / 3;
                let courante = 1;
                for (const f of feuilles) {
                    if (f.offsetTop <= haut) courante = +f.dataset.n;
                }
                if (document.activeElement !== champPage)
                    champPage.value = courante;
            }
            defilement.addEventListener("scroll", suivrePage, {
                passive: true,
            });

            const pageActuelle = () => +champPage.value || 1;
            $("btn-precedent").onclick = () => allerA(pageActuelle() - 1);
            $("btn-suivant").onclick = () => allerA(pageActuelle() + 1);
            champPage.addEventListener("keydown", (e) => {
                if (e.key === "Enter") allerA(+champPage.value);
            });

            /* ---------- Zoom ---------- */
            function appliquerZoom() {
                conteneur.style.width = zoom * 100 + "%";
                conteneur.style.maxWidth = zoom <= 1 ? "100%" : "none";
                conteneur.style.margin = zoom <= 1 ? "0 auto" : "0";
            }
            $("btn-zoom-plus").onclick = () => {
                zoom = Math.min(2.5, zoom + 0.25);
                appliquerZoom();
            };
            $("btn-zoom-moins").onclick = () => {
                zoom = Math.max(0.5, zoom - 0.25);
                appliquerZoom();
            };

            /* ---------- Recherche (réservée aux connectés) ---------- */
            $("btn-recherche").onclick = () => {
                if (!ESTCONNECTE) {
                    $("mur").scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                } else {
                    alert(
                        "Recherche dans le document : à brancher sur le texte extrait côté serveur.",
                    );
                }
            };

            /* ---------- Plein écran / partage ---------- */
            $("btn-plein-ecran").onclick = () => {
                const v = $("visionneuse");
                document.fullscreenElement
                    ? document.exitFullscreen()
                    : v.requestFullscreen?.();
            };
            $("btn-partager").onclick = async () => {
                const lien = location.origin + location.pathname;
                try {
                    if (navigator.share)
                        await navigator.share({
                            title: document.title,
                            url: lien,
                        });
                    else {
                        await navigator.clipboard.writeText(lien);
                        alert("Lien copié.");
                    }
                } catch (_) {}
            };

            /* ---------- Dissuasion contre la copie ---------- */
            // Ces mesures gênent l'utilisateur lambda ; la vraie protection
            // reste côté serveur (voir notes de livraison).
            const zone = $("visionneuse");
            ["contextmenu", "dragstart", "copy", "cut"].forEach((ev) =>
                zone.addEventListener(ev, (e) => e.preventDefault()),
            );
            document.addEventListener("keydown", (e) => {
                const k = e.key.toLowerCase();
                if ((e.ctrlKey || e.metaKey) && ["s", "p", "u"].includes(k))
                    e.preventDefault();
            });

            /* ---------- Miniatures des suggestions ---------- */
            document
                .querySelectorAll(".dt-vignette canvas")
                .forEach(async (c) => {
                    try {
                        const doc = await pdfjsLib.getDocument(c.dataset.pdf)
                            .promise;
                        const p = await doc.getPage(1);
                        const base = p.getViewport({ scale: 1 });
                        const vp = p.getViewport({ scale: 160 / base.width });
                        c.width = vp.width;
                        c.height = vp.height;
                        await p.render({
                            canvasContext: c.getContext("2d"),
                            viewport: vp,
                        }).promise;
                    } catch (_) {
                        c.width = 80;
                        c.height = 110;
                        const x = c.getContext("2d");
                        x.fillStyle = "#faf9f5";
                        x.fillRect(0, 0, 80, 110);
                        x.fillStyle = "#118549";
                        x.fillRect(0, 22, 80, 3);
                    }
                });

            init();
        </script>
    </body>
</html>

<!-- Se Connecter -->
