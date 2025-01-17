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
                'Explorez les meilleurs vignobles de la région avec un guide expert, qui vous fera découvrir les secrets bien gardés des terroirs locaux, tout en partageant des anecdotes fascinantes sur l&rsquo;histoire du vin et ses traditions ancestrales.',
                'Participez à une expérience unique mêlant histoire et dégustation de vin, où vous aurez l&rsquo;occasion de goûter des crus d&rsquo;exception, tout en apprenant les techniques ancestrales de vinification, guidés par un professionnel passionné par le monde du vin.',
                'Profitez d&rsquo;un voyage pittoresque à travers des paysages de vignobles, où la beauté des paysages vous émerveillera à chaque étape. Vous découvrirez les richesses culturelles et gastronomiques de la région tout en savourant des vins raffinés de qualité.',
                'Dégustez des vins fins et apprenez des secrets de production, des premières étapes de la récolte jusqu&rsquo;à la mise en bouteille. Chaque gorgée vous permettra de mieux comprendre le travail minutieux des vignerons et les particularités de chaque cépage.',
                'Visitez les plus beaux domaines viticoles et découvrez leurs méthodes, des techniques de culture biodynamique aux savoir-faire innovants. En rencontrant les vignerons, vous comprendrez mieux le lien entre la terre, le climat et la qualité des vins produits.',
                'Plongez dans l&rsquo;histoire de la vinification avec un expert local, qui vous guidera à travers les étapes cruciales de la production de vin. De la culture des vignes à la maturation en cave, vous en apprendrez davantage sur les influences historiques et culturelles de cette tradition.',
                'Découvrez les techniques de récolte et de production du vin, en visitant des domaines viticoles qui allient modernité et tradition. Vous aurez l&rsquo;occasion de participer à des ateliers pratiques, où vous apprendrez à identifier les arômes et les nuances de différents vins.',
                'Vivez une expérience inoubliable entre nature et vin, en explorant des terroirs magnifiques, souvent classés au patrimoine mondial. Vous goûterez des vins authentiques tout en profitant de moments conviviaux avec les producteurs, qui partageront leur passion du vin.'
            ]),
            'price_per_person' => fake()->randomFloat(2, 100, 500),
            'days' => fake()->randomElement([0.5, 1, 2, 3]),
            'state_travel' => fake()->randomElement(["Valide"]), //"aValide","Cree"
        ];
    }
}
