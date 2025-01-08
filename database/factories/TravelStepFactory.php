<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravelStep>
 */
class TravelStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $titles = [
            'Arrivée et accueil' => 'Accueillez-vous dans un cadre chaleureux et découvrez le programme de votre séjour.',
            'Visite des vignobles' => 'Plongez dans l’histoire du vin et visitez les meilleurs vignobles de la région.',
            'Dégustation de vin' => 'Dégustez les vins les plus renommés de la région tout en apprenant leur histoire.',
            'Repas traditionnel' => 'Participez à un repas traditionnel avec des produits locaux, accompagnés de vins régionaux.',
            'Exploration de la cave' => 'Explorez les caves où les meilleurs crus prennent naissance.',
            'Découverte du terroir local' => 'Découvrez les secrets du terroir local avec un guide spécialisé.',
            'Visite guidée des domaines' => 'Visitez des domaines viticoles prestigieux et apprenez-en plus sur leur processus de production.',
            'Atelier de dégustation' => 'Venez participer à un atelier interactif de dégustation de vin avec un sommelier expert.',
            'Promenade dans les vignes' => 'Faites une promenade pittoresque dans les vignes et découvrez les paysages environnants.',
            'Séance de relaxation' => 'Détendez-vous lors d’une séance de relaxation dans un cadre naturel et apaisant.',
            'Dîner avec vue' => 'Dînez avec une vue imprenable sur les vignes et les paysages alentours.',
            'Rencontre avec les vignerons' => 'Rencontrez les vignerons locaux et apprenez leurs secrets de production du vin.',
            'Déjeuner en plein air' => 'Savourez un déjeuner en plein air avec des produits de la région.',
            'Dégustation des grands crus' => 'Découvrez des grands crus pendant une dégustation privée dans un cadre exceptionnel.',
            'Excursion en montagne' => 'Profitez d’une excursion en montagne pour explorer les environs tout en dégustant un vin local.',
            'Balade en vélo électrique' => 'Faites une balade en vélo électrique à travers les vignes et les villages pittoresques.',
            'Visite des installations de vinification' => 'Visitez les installations modernes de vinification et apprenez les techniques de production.',
            'Dîner gastronomique' => 'Dînez dans un restaurant gastronomique, avec des plats accompagnés de vins fins.',
            'Découverte des spécialités locales' => 'Découvrez les spécialités locales lors d’une expérience culinaire unique.',
            'Soirée de clôture' => 'Terminez votre séjour avec une soirée festive et une dégustation finale des meilleurs vins.'
        ];

        // Sélection aléatoire d'un titre
        $randomTitle = fake()->randomElement(array_keys($titles));

        // Récupération de la description associée au titre
        $randomDescription = $titles[$randomTitle];

        return [
            'travel_id' => Travel::all()->random()->id,
            'title' => $randomTitle,
            'description' => $randomDescription
        ];
    }
}
