#!/bin/bash

echo "Le fichier .env est correctement configurée (o/n)"
read reponse

# Vérifier la réponse de l'utilisateur
if [[ $reponse != "o" ]]; then
    echo "exit"
    exit 0
fi

$main=$(git rev-parse --abbrev-ref HEAD)


if [[ $main != "main" ]]; then
    echo "GROS FILS DE PUTE T'es sur le main sale merde de t'es mort fait un PUTAIN D'EFFORT DANS TA VIE, PERSONNE NE TAIME même pas ta mère, t'es adopté et non désiré . t'es qu'UNE GROSSE MERDE"
    echo "Tu veux aller sur quel branche du coup ? (●'◡'●)"
    read branchname

    git branch -M $branchname
fi



# Installer les dépendances Node.js via npm
echo "Installation des dépendances Node.js..."
npm install
npm install jquery --save
npm install chart.js

# Mettre à jour Composer (mises à jour des dépendances PHP)
echo "Mise à jour de Composer..."
composer update

# Générer la clé de l'application Laravel
echo "Génération de la clé de l'application Laravel..."
php artisan key:generate

# Exécuter la migration fraîche de la base de données
echo "Exécution de la migration de la base de données..."
php artisan migrate:fresh

echo "Environ 2min"

# Exécuter les seeds pour initialiser la base de données
php artisan db:seed --class DatabaseSeeder
echo "12%"
php artisan db:seed --class PartnerSeeder
echo "50%"
php artisan db:seed --class DummySeeder
echo "65%"
php artisan db:seed --class UserSeeder

npm run build

# Afficher un message de fin
echo "La configuration du serveur est terminée !"
echo "php artisan serve --host 0.0.0.0 --port 8453"
