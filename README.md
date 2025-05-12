# SpookGame 🎃

**SpookGame** est une application web de fiction interactive multi-plateforme développée avec **Laravel** pour le backend et **Vue.js** pour le frontend. Le joueur progresse dans une histoire à choix multiples où chaque décision influence la suite du récit.

## Fonctionnalités principales

-   Navigation dans des histoires à choix multiples
-   API versionnée
-   Authentification et protection des routes (Breeze)
-   Navigation dynamique entre les chapitres
-   Frontend responsive avec Vue.js 3
-   Sauvegarde de progression de lecture (LocalStorage)
-   Gestion des erreurs côté API et interface utilisateur

## Structure du projet

-   **backend/** – Laravel : API, modèles, contrôleurs, base de données
-   **frontend/** – Vue.js : composants, vues, interactions utilisateur

## Technologies utilisées

-   Laravel 10+
-   Vue.js 3+
-   SQLite
-   NPM, Composer

## Installation

### Prérequis
Avant de commencer, assurez-vous d’avoir les éléments suivants installés sur votre machine :
- Node.js
- Composer
- Laravel

### Clonage du projet

Commencez par **cloner ce dépôt** sur votre machine, puis placez-vous dans le dossier du projet.

### Installation et configuration

#### 1. Installer les dépendances PHP
```bash
composer install
```

#### 2. Copiez le fichier d’environnement et générez la clé de l’application :
```bash
cp .env.example .env
php artisan key:generate
```

#### 3. Lancez les migrations avec les données de test :
```bash
php artisan migrate --seed
```

#### 4. Démarrez le serveur Laravel :
```bash
php artisan serve
```

#### 5. Dans un **deuxième terminal**, installez les dépendances front-end et lancez le serveur de développement :
```bash
npm install
npm run build
npm run dev
```

### Accéder à l'application
Une fois les serveurs lancés, l’application sera accessible depuis votre navigateur à l’adresse : **http://localhost:8000**
