<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
use App\Models\WineRoad;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'wine_road_id' => WineRoad::all()->random()->id,
            'department_id' => Department::all()->random()->id,
            'travel_category_id' => TravelCategory::all()->random()->id,
            'vineyard_category_id' => VineyardCategory::all()->random()->id,
            'participant_category_id' => ParticipantCategory::all()->random()->id,
            'title' => fake()->randomElement([
                'Découverte des vignobles',
                'Circuit vin et gastronomie',
                'Expérience de dégustation exclusive',
                'Tour des grands crus',
                'Séjour vinicole de luxe',
                'Aventure dans les vignobles',
                'Escapade œnologique',
                'Voyage au cœur des terroirs'
            ]),
            'description' => fake()->randomElement([
                'Explorez les meilleurs vignobles de la région avec un guide expert.',
                'Participez à une expérience unique mêlant histoire et dégustation de vin.',
                'Profitez d’un voyage pittoresque à travers des paysages de vignobles.',
                'Dégustez des vins fins et apprenez des secrets de production.',
                'Visitez les plus beaux domaines viticoles et découvrez leurs méthodes.',
                'Plongez dans l’histoire de la vinification avec un expert local.',
                'Découvrez les techniques de récolte et de production du vin.',
                'Vivez une expérience inoubliable entre nature et vin.'
            ]),
            'price_per_person' => fake()->randomFloat(2, 100, 300),
            'days' => fake()->randomElement([0.5, 1, 2, 3]),
        ];
    }
}
