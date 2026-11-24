# SGM-ENEAM

**Système de Gestion des Mémoires de l'ENEAM**

Une bibliothèque numérique où les étudiants de l'ENEAM déposent leur mémoire, le font valider, puis le rendent consultable en ligne par les autres étudiants.

## Objectifs

- Centraliser les mémoires au même endroit, au lieu de les laisser dispersés en papier ou sur des clés USB.
- Encadrer chaque mémoire par un circuit de validation clair avant toute publication.
- Permettre aux étudiants de chercher et lire les mémoires existants depuis leur navigateur.
- Donner à l'administration une vue sur ce qui est déposé, validé et consulté.

## Acteurs

| Acteur | Ce qu'il fait |
|---|---|
| Étudiant | Dépose son mémoire (titre, résumé, mots-clés, filière, année, encadreur, PDF) et suit son avancement |
| Chef de département | Assigne un encadreur, vérifie le taux de plagiat, valide ou rejette un mémoire |
| Encadreur | Suit le mémoire et laisse un commentaire à chaque version déposée |
| Service examen | Programme la date de soutenance |
| Bibliothécaire | Rend les mémoires publics et consulte les statistiques de lecture |
| Administrateur | Gère les utilisateurs, les filières et les années académiques |
| Lecteur | Tout étudiant connecté qui parcourt le catalogue |

## Inscription et connexion

Tout le monde se connecte au même endroit, avec son **email et son mot de passe**. Ce qui change, c'est la façon d'obtenir son compte.

**Étudiant : activation par matricule.** On part du principe que l'ENEAM possède déjà les données de ses étudiants (une table de référence). L'étudiant n'invente donc rien, il active un compte qui existe déjà :

1. Il saisit son matricule.
2. Le système affiche ses informations (email masqué) pour qu'il confirme que c'est bien lui.
3. Un code de vérification est envoyé par mail.
4. Il saisit le code, puis choisit son mot de passe.

**Personnel : invitation par l'administrateur.** Le chef de département, le service examen, le bibliothécaire et l'encadreur n'ont pas de matricule étudiant. L'administrateur crée leur compte et ils reçoivent un mail pour choisir leur mot de passe.

Une fois connecté, c'est le rôle de la personne qui décide de ce qu'elle voit. Un même membre du personnel peut avoir plusieurs rôles (un chef de département est souvent aussi encadreur).

## Le parcours d'un mémoire

1. L'étudiant dépose son mémoire. Statut : **soumis**.
2. Le chef de département assigne un encadreur.
3. L'encadreur suit le travail. À chaque nouvelle version, il laisse un commentaire. Statut : **en cours de vérification**.
4. Le chef de département consulte le taux de plagiat, puis décide :
   - **validé**, le mémoire peut avancer ;
   - **rejeté**, avec un motif obligatoire.
5. Dans les deux cas, l'étudiant est notifié.
6. Le service examen programme la date de soutenance.
7. Le bibliothécaire rend le mémoire public. Il apparaît alors dans le catalogue.

## Fonctionnalités

**De base**
- Activation de compte étudiant par matricule
- Dépôt de mémoire avec fichier PDF
- Circuit de validation avec notification
- Catalogue interne : liste, fiche détaillée, recherche par titre, auteur, mot-clé, filière et année
- Lecture en ligne dans le navigateur (PDF.js), téléchargement désactivable
- Gestion des utilisateurs, des filières et des années académiques

**Avancées (bonus)**
- Recherche plein texte (MySQL FULLTEXT)
- Détection de doublons et de plagiat simplifié (comparaison des titres et des résumés)
- Statistiques de consultation et mémoires les plus lus
- Favoris et historique de lecture
- Embargo : un mémoire n'est visible qu'après une date donnée

## Points d'attention

- **Droits d'auteur et confidentialité** : certains mémoires peuvent être en accès restreint.
- **Fichiers** : le format et la taille des PDF sont contrôlés au dépôt.
- **Désactiver le téléchargement** réduit l'usage, mais ne protège pas complètement le fichier. À savoir pour ne pas promettre plus que ce que le système fait.

## À trancher

- L'encadreur est-il toujours un enseignant de l'ENEAM (avec un compte), ou peut-il être externe ?
- D'où viennent réellement les données des étudiants : export fourni par l'ENEAM, ou jeu de données de test ?

## Stack technique

- Laravel
- MySQL
- PDF.js pour la lecture en ligne

Pense à renseigner la base de données dans le fichier `.env` avant de lancer `migrate`.

## Équipe

- [FIODEKANHOUN Belmonde](https://github.com/Bel-bg)
- [AKONDE Daniel](https://github.com/Danielak-gif)
- [DJIVOH Onacisse](https://github.com/Onacisse)
