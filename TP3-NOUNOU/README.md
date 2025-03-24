# New Life Pets

New Life Pets est une application web permettant de faciliter l'adoption et la gestion des animaux de compagnie. Le site tourne sous Laravel 12 et propose une interface intuitive pour les utilisateurs.

## Prérequis
Avant d'installer et d'exécuter ce projet, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- **PHP** >= 8.2
- **Composer** (gestionnaire de dépendances PHP)
- **MySQL** ou un autre serveur de base de données compatible
- **Node.js** et **npm** (pour gérer les assets front-end)
- **Git** (pour cloner le projet)
- **Docker** (optionnel, si vous utilisez un environnement conteneurisé)

## Installation

1. **Cloner le dépôt Git**
```sh
git clone https://github.com/votre-utilisateur/new-life-pets.git
cd new-life-pets
```

2. **Installer les dépendances PHP**
```sh
composer install
```

3. **Configurer l'environnement**
Copiez le fichier `.env.example` et renommez-le en `.env` :
```sh
cp .env.example .env
```
Modifiez le fichier `.env` pour configurer la connexion à la base de données.

4. **Générer la clé d'application**
```sh
php artisan key:generate
```

5. **Configurer la base de données**
Créez une base de données MySQL et mettez à jour `.env` avec les bonnes informations.
Puis, exécutez les migrations :
```sh
php artisan migrate --seed
```

6. **Installer les dépendances front-end**
```sh
npm install && npm run build
```

7. **Lancer le serveur local**
```sh
php artisan serve
```
L'application sera accessible à l'adresse `http://127.0.0.1:8000/`.

## Utilisation avec Docker (optionnel)
Si vous utilisez Docker, vous pouvez lancer le projet avec :
```sh
docker-compose up -d
```




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## À propos de Laravel

Laravel est un framework pour applications web offrant une syntaxe élégante et expressive. Nous pensons que le développement doit être une expérience agréable et créative pour être réellement enrichissante. Laravel simplifie le développement en automatisant les tâches courantes utilisées dans de nombreux projets web, telles que :

- [Un moteur de routage simple et rapide.](https://laravel.com/docs/routing).
- [Un puissant conteneur d'injection de dépendances.](https://laravel.com/docs/container).
- Plusieurs options de stockage pour [les sessions](https://laravel.com/docs/session) et [le cache](https://laravel.com/docs/cache).
- [Un ORM de base de données expressif et intuitif.](https://laravel.com/docs/eloquent).
- [Des migrations de schéma indépendantes du système de base de données.](https://laravel.com/docs/migrations).
- [Un traitement robuste des tâches en arrière-plan.](https://laravel.com/docs/queues).
- [Une diffusion d'événements en temps réel.](https://laravel.com/docs/broadcasting).

Laravel est à la fois accessible et puissant, et fournit les outils nécessaires à la création d'applications robustes et évolutives.

## Apprendre Laravel

Laravel dispose de la documentation la plus complète et détaillée parmi les frameworks modernes pour applications web, ce qui le rend facile à prendre en main. Consultez la [documentation officielle](https://laravel.com/docs).

Vous pouvez également essayer le [Laravel Bootcamp](https://bootcamp.laravel.com), où vous serez guidé pas à pas dans la création d'une application Laravel moderne.

Si vous préférez apprendre par la pratique, [Laracasts](https://laracasts.com) propose des milliers de tutoriels vidéo sur des sujets variés, notamment Laravel, PHP moderne, les tests unitaires et JavaScript. Améliorez vos compétences grâce à cette vaste bibliothèque de contenus.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
