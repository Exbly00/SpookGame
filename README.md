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

Clonez le dépôt, puis lancez les deux serveurs suivants dans des terminaux séparés :

```bash
composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan serve
```

```bash
npm install

npm run build

npm run dev
```

L'application sera alors accessible dans votre navigateur sur le port 8000.
