# Jeu de Cartes Symfony

Ce projet est une application Symfony qui génère une main de 10 cartes aléatoires, puis trie cette main selon un ordre aléatoire des couleurs et des valeurs. L'application affiche à la fois la main non triée et la main triée.

## Prérequis

- PHP 8.3
- Composer
- Symfony CLI

## Installation
1. Clonez ce dépôt :

   `git clone https://github.com/chakib-lah/cardGame.git`

   `cd cardGame`

2. Installez les dépendances via Composer:

   `composer install`

## Démarrage du serveur de développement
Pour démarrer le serveur de développement Symfony, exécutez :
`symfony server:start`

Visitez http://localhost:8000 dans votre navigateur pour voir l'application en action.

## Structure du Projet

* src/Service/CardGameService.php : Contient la logique principale pour générer et trier les cartes.
* src/Controller/CardGameController.php : Contrôleur pour gérer les requêtes HTTP et rendre la vue.
* templates/card_game/index.html.twig : Vue Twig pour afficher la main de cartes.
* tests/Service/CardGameServiceTest.php : Tests unitaires pour le service.
* tests/Controller/CardGameControllerTest.php : Tests fonctionnels pour le contrôleur.

## Tests

Pour exécuter les tests, utilisez PHPUnit. Assurez-vous que les dépendances de développement sont installées :
`composer install --dev`

Exécutez les tests avec la commande suivante :
`vendor/bin/phpunit`

