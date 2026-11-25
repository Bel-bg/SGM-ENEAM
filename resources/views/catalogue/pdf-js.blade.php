<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

        <script>
            // Configuration du Worker PDF.js
            pdfjsLib.GlobalWorkerOptions.workerSrc =
                "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";

            // Conservation des URL temporaires pour éviter leur révocation prématurée
            let urlPdfLocal = null;

            // Dessiner la première page d'un PDF
            async function dessinerCouverture(sourcePdf, canvas) {
                try {
                    const loadingTask = pdfjsLib.getDocument(sourcePdf);
                    const pdf = await loadingTask.promise;

                    const page = await pdf.getPage(1);

                    // Dimensions disponibles
                    const conteneur = canvas.parentElement;
                    const largeur = conteneur.clientWidth || 192;

                    // Calcul automatique du facteur d'échelle
                    const viewportInitial = page.getViewport({ scale: 1 });
                    const scale = largeur / viewportInitial.width;

                    const viewport = page.getViewport({ scale });

                    canvas.width = Math.floor(viewport.width);
                    canvas.height = Math.floor(viewport.height);

                    const contexte = canvas.getContext("2d");

                    await page.render({
                        canvasContext: contexte,
                        viewport: viewport,
                    }).promise;

                    console.log("Couverture PDF affichée :", sourcePdf);
                } catch (erreur) {
                    console.error("Impossible de charger le PDF :", erreur);

                    const ctx = canvas.getContext("2d");

                    canvas.width = 192;
                    canvas.height = 256;

                    ctx.fillStyle = "#faf9f5";
                    ctx.fillRect(0, 0, 192, 256);

                    ctx.fillStyle = "#118549";
                    ctx.fillRect(0, 42, 192, 6);

                    ctx.fillStyle = "#151515";
                    ctx.font = "bold 14px sans-serif";
                    ctx.fillText("MÉMOIRE ENEAM", 24, 92);

                    ctx.fillStyle = "#747474";
                    ctx.font = "11px sans-serif";
                    ctx.fillText("PDF indisponible", 24, 128);
                }
            }

            // Chargement des PDF présents dans le catalogue
            document.addEventListener("DOMContentLoaded", () => {
                document
                    .querySelectorAll(".pdf-couverture")
                    .forEach((canvas) => {
                        dessinerCouverture(canvas.dataset.pdf, canvas);
                    });
            });

            // Chargement d'un PDF depuis l'ordinateur
            document
                .getElementById("input-pdf-local")
                .addEventListener("change", function (e) {
                    const fichier = e.target.files[0];

                    if (!fichier) return;

                    if (fichier.type !== "application/pdf") {
                        alert("Veuillez sélectionner un fichier PDF valide.");
                        return;
                    }

                    // Libérer l'ancienne URL temporaire
                    if (urlPdfLocal) {
                        URL.revokeObjectURL(urlPdfLocal);
                    }

                    urlPdfLocal = URL.createObjectURL(fichier);

                    const lecteur = new FileReader();

                    lecteur.onload = async function () {
                        const donneesPdf = new Uint8Array(this.result);

                        // Mise à jour des miniatures
                        const canvasElements =
                            document.querySelectorAll(".pdf-couverture");

                        for (const canvas of canvasElements) {
                            await dessinerCouverture(
                                { data: donneesPdf.slice() },
                                canvas,
                            );

                            const lien = canvas.closest("a");

                            if (lien) {
                                lien.href = urlPdfLocal;
                            }
                        }

                        // Mise à jour des liens des titres
                        document
                            .querySelectorAll(".doc-titre a")
                            .forEach((lien) => {
                                lien.href = urlPdfLocal;
                            });

                        // Mise à jour des boutons de téléchargement
                        document
                            .querySelectorAll(
                                ".doc-action-btn[aria-label='Télécharger']",
                            )
                            .forEach((bouton) => {
                                bouton.onclick = () => {
                                    const telechargement =
                                        document.createElement("a");
                                    telechargement.href = urlPdfLocal;
                                    telechargement.download = fichier.name;
                                    telechargement.click();
                                };
                            });

                        console.log(
                            "PDF local chargé avec succès :",
                            fichier.name,
                        );
                    };

                    lecteur.readAsArrayBuffer(fichier);
                });
        </script>