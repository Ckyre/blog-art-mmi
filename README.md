Groupe 8 : blog d'urbex
=======================
Martin Condet, Arthur Blanc, Régis Cosaque, Kayo Silva, Gabriel Rouleau, Nicolas Marsan

Explication des dossiers
------------------------

**app:**
  * **Controllers:** `Met à jour les modèles et renvoit les vues.`
  * **Exception:** `Dossier des erreurs, renvoit la vue correspondante.`
  * **Models:** `Définit la structure des données.`
  * **Validation:** `Régle de validation (input des forms).`
  * **Helpers:** `Fonction utiles.`

**database:** `Connexion à la base de donnée.`  
**public:** `Ecriture des routes et de leurs actions.`  
**routes:** `Chemin récupéré de l'url pour renvoyer la bonne vue.`  
**vendor:** `Gère le chargement automatique des fichiers.`  
**views:** `Dossier de vues (Page renvoyé par l'url, affichage des éléments).`  

**.htaccess:** `Récupére l'url, découpe et renvoit pour traiter les chemins.`  
**composer.json:** `Fichier de configuration des dépendances.`


Installation du projet
------------------------

Pour installer le projet sur votre machine, il faut l'installer à la racine de votre dossier www (sous Wampserver)

Lien du site en ligne
------------------------
**https://urbex-mmibordeaux.herokuapp.com/**

Accéder au panel admin
------------------------

Pour accéder au panel admin, vous devez vous connecter avec ces identifiants:
- **Identifiant:** `Admin`
- **Mot de passe:** `Admin123`

Vous aurez ensuite accès à toutes les fonctionnalités du site en allant sur localhost/admin ou https://urbex-mmibordeaux.herokuapp.com/admin (selon si vous êtes en local ou en ligne)

Identifiant en tant que membre
------------------------

Si vous voulez tester en n'ayant pas les droits admin, vous devez vous connecter avec ces identifiants:
- **Identifiant:** `Membre`
- **Mot de passe:** `Membre123`

Récapitulatif de ce qui a été fait en back
------------------------
- [X] Angle
  - [X] Create
  - [X] Delete
  - [X] Update
  - [X] Get

- [X] Article
  - [X] Create
  - [X] Delete
  - [X] Update
  - [X] Get

- [ ] Commentaire
  - [ ] Create
  - [ ] Delete
  - [ ] Update
  - [ ] Get

- [ ] Langue
  - [ ] Create
  - [ ] Delete
  - [ ] Update
  - [ ] Get

- [X] Article
  - [X] Create
  - [X] Delete
  - [X] Update
  - [X] Get

- [ ] Like Commentaire
  - [ ] Create
  - [ ] Delete
  - [ ] Update
  - [ ] Get

- [X] Mot clé
  - [X] Create
  - [X] Delete
  - [X] Update
  - [X] Get

- [X] Statut
  - [X] Create
  - [X] Delete
  - [X] Update
  - [X] Get

- [X] Thématiques
  - [X] Create
  - [X] Delete
  - [X] Update
  - [X] Get
