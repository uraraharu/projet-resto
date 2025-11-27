# Fiche Technique - Projet Resto

## 1. Présentation du Projet
Le projet **Resto** est une application web de gestion et de consultation de restaurants. Elle permet aux utilisateurs de rechercher des restaurants, de consulter leurs détails (description, horaires, photos, type de cuisine), de les noter et de les critiquer.

## 2. Architecture Technique
L'application suit le modèle d'architecture **MVC (Modèle-Vue-Contrôleur)**, séparant clairement la logique métier, l'interface utilisateur et le contrôle des actions.

### Structure des Dossiers
- **`controleur/`** : Contient la logique de traitement des requêtes.
  - `controleurPrincipal.php` : Gère le routage des actions vers les contrôleurs spécifiques.
  - Autres fichiers (`aimer.php`, `connexion.php`, etc.) : Contrôleurs pour chaque fonctionnalité.
- **`modele/`** : Contient les fonctions d'accès aux données (DAO).
  - `bd.pdo.php` : Gère la connexion à la base de données.
  - Autres fichiers (`bd.resto.php`, `bd.critiquer.php`, etc.) : Fonctions CRUD pour chaque entité.
- **`vue/`** : Contient les templates HTML pour l'affichage.
  - `entete.html.php` / `pied.html.php` : Éléments communs (header/footer).
  - Autres fichiers (`vueListeRestos.php`, `vueDetailResto.php`, etc.) : Vues spécifiques.
- **`css/`** : Feuilles de style CSS.
- **`images/`** et **`photos/`** : Ressources graphiques.
- **`index.php`** : Point d'entrée unique de l'application (Front Controller).

## 3. Base de Données
L'application utilise une base de données MySQL nommée `resto`.

### Principales Tables (déduites du modèle)
- **`resto`** : Informations sur les restaurants.
- **`typecuisine`** : Types de cuisine.
- **`photo`** : Photos associées aux restaurants.
- **`horaire`** : Horaires d'ouverture.
- **`critiquer`** : Critiques et notes laissées par les utilisateurs.
- **`aimer`** : Gestion des "J'aime".
- **`utilisateur`** : Comptes utilisateurs.

## 4. Fonctionnalités Principales
- **Authentification** : Connexion et déconnexion des utilisateurs.
- **Recherche** : Recherche de restaurants par critères (nom, adresse, multi-critères).
- **Consultation** : Affichage de la liste des restaurants et des détails d'un restaurant spécifique.
- **Interaction** :
  - Aimer un restaurant.
  - Laisser une critique (note et commentaire).

## 5. Installation et Configuration

### Prérequis
- Serveur Web (Apache/Nginx) avec PHP.
- Serveur de base de données MySQL/MariaDB.

### Configuration
1. **Base de données** :
   - Créer une base de données nommée `resto`.
   - Importer le schéma et les données (fichier SQL non fourni dans l'arborescence, à vérifier).
2. **Connexion BDD** :
   - Vérifier les paramètres de connexion dans `modele/bd.pdo.php` :
     ```php
     $login = "root";
     $mdp = "";
     $bd = "resto";
     $serveur = "localhost";
     ```
3. **Lancement** :
   - Placer le dossier `resto` dans le répertoire racine du serveur web (ex: `www` ou `htdocs`).
   - Accéder à l'application via `http://localhost/resto`.
