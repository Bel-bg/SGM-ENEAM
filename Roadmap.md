# Répartition du travail

Trois rôles, trois livrables. Chacun avance dans son coin, mais certains points dépendent des autres : ils sont signalés plus bas.

## 1. Base de données et controllers

**Assigné à :** à définir

**Ce qu'il livre :** tout ce qui tourne côté serveur, du schéma SQL jusqu'aux routes.

**Ce qu'il fait**
- Écrire les migrations et les modèles avec leurs relations : `users`, `roles` (table pivot, un utilisateur peut avoir plusieurs rôles), `etudiants` (table de référence ENEAM), `filieres`, `annees_academiques`, `memoires`, `versions_memoire`, `commentaires`, `historique_statuts`, `soutenances`, `favoris`, `consultations`.
- Préparer des seeders avec de fausses données (étudiants de test, un compte par rôle) pour que tout le monde puisse travailler sans attendre.
- Coder l'activation de compte étudiant : vérification du matricule, code à 5 chiffres par mail (haché, avec expiration et nombre d'essais limité), puis création du mot de passe.
- Coder l'invitation du personnel par l'administrateur.
- Coder le circuit du mémoire : dépôt, assignation de l'encadreur, versions et commentaires, validation ou rejet avec motif, programmation de la soutenance, publication.
- Protéger les accès avec des policies Laravel (une par rôle).
- Stocker les PDF dans un dossier privé et les servir par une route qui vérifie les droits.
- Envoyer les notifications par mail.

**Comment**
- Un controller par ressource (`MemoireController`, `VersionController`, `SoutenanceController`...), des Form Requests pour la validation des champs.
- Le statut d'un mémoire est un enum, avec les transitions autorisées écrites à un seul endroit.
- Les bonus (FULLTEXT, plagiat simplifié, embargo) viennent à la fin.

## 2. Vues

**Assigné à :** à définir

**Ce qu'il livre :** toutes les pages que voit l'utilisateur, en Blade.

**Ce qu'il fait**
- Un layout commun (navigation, pied de page, messages d'erreur et de succès) réutilisé partout.
- Page de connexion unique, et les 4 écrans d'activation étudiant (matricule, confirmation des infos, code, mot de passe).
- Un tableau de bord par rôle : étudiant, chef de département, encadreur, service examen, bibliothécaire, administrateur.
- Formulaire de dépôt, fiche d'un mémoire avec ses versions et ses commentaires.
- Catalogue public interne avec recherche et filtres, et lecteur PDF.js.
- Pages d'administration (utilisateurs, filières, années) et page de statistiques.

**Comment**
- Il part des maquettes de l'étape 3 et des écrans déjà dessinés sur Excalidraw.
- Il travaille avec des données factices au départ, sans attendre les controllers.
- Il se met d'accord avec le rôle 1 sur le nom des routes et des variables envoyées à chaque vue.

## 3. Schémas (Visual Paradigm)

**Assigné à :** à définir

**Ce qu'il livre :** les diagrammes du rapport, et surtout les plans que les deux autres suivent.

**Ce qu'il fait**
- Diagramme de cas d'utilisation (par acteur).
- Modèle conceptuel et logique de données : c'est lui qui sert de base aux migrations.
- Diagramme de classes.
- Diagramme d'états du mémoire (soumis, en cours de vérification, validé, rejeté, publié).
- Diagrammes de séquence pour l'activation de compte et pour le dépôt jusqu'à la validation.
- Éventuellement un diagramme d'activité du parcours complet.

**Comment**
- Les exports (PNG et PDF) vont dans un dossier `docs/schemas/` du dépôt.
- Il livre d'abord le modèle de données, tout de suite, parce que le rôle 1 en a besoin pour écrire les migrations.
- Il met à jour les schémas dès que la base évolue, pour que le rapport ne contredise pas le code.

## Ordre de travail

1. **Cas d'utilisation et modèle de données** (rôle 3). Le rôle 1 attend ce livrable.
2. **Migrations et seeders** (rôle 1). Pendant ce temps, le rôle 2 fait le layout et les écrans d'authentification.
3. **Activation, connexion, rôles** (rôles 1 et 2 ensemble).
4. **Dépôt, versions, validation, soutenance** (rôles 1 et 2).
5. **Catalogue, lecture en ligne, statistiques.**
6. **Bonus**, seulement si le reste est solide.

## Règles communes

- Un seul dépôt GitHub, une branche par personne, jamais de push direct sur `main`. Tout passe par une pull request relue par un autre membre.
- Messages de commit courts et clairs, à l'infinitif (ajout, correction, mise à jour).
- Nommage à fixer ensemble dès le début (proposition : noms de tables en français, au pluriel, en `snake_case`).
- Quand une décision ouverte du README est tranchée (statut de l'encadreur, origine des données étudiantes), on met à jour le README le jour même.
