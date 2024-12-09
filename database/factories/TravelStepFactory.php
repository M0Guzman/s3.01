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
        return [
            'travel_id' => Travel::all()->random()->id,
            'title' => fake()->randomElement([
                'Arrivée et accueil',
                'Visite des vignobles',
                'Dégustation de vin',
                'Repas traditionnel',
                'Exploration de la cave',
                'Découverte du terroir local',
                'Visite guidée des domaines',
                'Atelier de dégustation',
                'Promenade dans les vignes',
                'Séance de relaxation',
                'Dîner avec vue',
                'Rencontre avec les vignerons',
                'Déjeuner en plein air',
                'Dégustation des grands crus',
                'Excursion en montagne',
                'Balade en vélo électrique',
                'Visite des installations de vinification',
                'Dîner gastronomique',
                'Découverte des spécialités locales',
                'Soirée de clôture'
            ]),
            'description' => fake()->randomElement([
                'Accueillez-vous dans un cadre chaleureux et découvrez le programme de votre séjour.',
                'Plongez dans l’histoire du vin et visitez les meilleurs vignobles de la région.',
                'Dégustez les vins les plus renommés de la région tout en apprenant leur histoire.',
                'Participez à un repas traditionnel avec des produits locaux, accompagnés de vins régionaux.',
                'Explorez les caves où les meilleurs crus prennent naissance.',
                'Découvrez les secrets du terroir local avec un guide spécialisé.',
                'Visitez des domaines viticoles prestigieux et apprenez-en plus sur leur processus de production.',
                'Venez participer à un atelier interactif de dégustation de vin avec un sommelier expert.',
                'Faites une promenade pittoresque dans les vignes et découvrez les paysages environnants.',
                'Détendez-vous lors d’une séance de relaxation dans un cadre naturel et apaisant.',
                'Dînez avec une vue imprenable sur les vignes et les paysages alentours.',
                'Rencontrez les vignerons locaux et apprenez leurs secrets de production du vin.',
                'Savourez un déjeuner en plein air avec des produits de la région.',
                'Découvrez des grands crus pendant une dégustation privée dans un cadre exceptionnel.',
                'Profitez d’une excursion en montagne pour explorer les environs tout en dégustant un vin local.',
                'Faites une balade en vélo électrique à travers les vignes et les villages pittoresques.',
                'Visitez les installations modernes de vinification et apprenez les techniques de production.',
                'Dînez dans un restaurant gastronomique, avec des plats accompagnés de vins fins.',
                'Découvrez les spécialités locales lors d’une expérience culinaire unique.',
                'Terminez votre séjour avec une soirée festive et une dégustation finale des meilleurs vins.'
            ]),
        ];
    }
}
