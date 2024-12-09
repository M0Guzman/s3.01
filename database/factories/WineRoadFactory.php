<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WineRoad>
 */
class WineRoadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Route des Grands Vins',
                'Vallée des Vins',
                'Chemin des Vignobles',
                'Route du Terroir',
                'Route des Crus',
                'Chemin des Caves',
                'Vignoble Royal',
                'Route des Vins de Prestige',
                'Circuit des Terroirs',
                'Route des Saveurs',
                'Sentier des Grands Vins',
                'Chemin du Vin',
                'Vignes et Vins',
                'Route des Vins ensoleillés',
                'Circuit des Vins d’Exception',
                'Les Routes du Vin',
                'Vignes de Luxe',
                'Sentier des Vins et Châteaux',
                'Les Chemins de la Vigne',
                'Route du Vin de Tradition'
            ]),
            'description' => fake()->randomElement([
                'Explorez cette route mythique et découvrez les meilleurs crus de la région.',
                'Parcourez la vallée pour découvrir des vins de renommée internationale.',
                'Un circuit pittoresque qui vous fait traverser les plus beaux vignobles.',
                'Découvrez des vins d’exception tout en explorant des paysages magnifiques.',
                'Suivez cette route prestigieuse et dégustez les meilleurs vins de la région.',
                'Plongez dans l’histoire de la viticulture tout en découvrant des vins locaux.',
                'Explorez un territoire viticole unique, avec une large gamme de vins à découvrir.',
                'Voyagez à travers des paysages viticoles exceptionnels et dégustez des crus rares.',
                'Un itinéraire offrant des vues spectaculaires et des vins d’une qualité incomparable.',
                'Visitez des vignobles renommés et dégustez des vins finement élaborés.',
                'Partez à la découverte de vignes ancestrales et savourez des vins d’exception.',
                'Admirez des paysages viticoles à couper le souffle et découvrez des vins prestigieux.',
                'Dégustez des crus uniques tout en découvrant le patrimoine viticole local.',
                'Vivez une aventure œnologique à travers cette route viticole légendaire.',
                'Empruntez cette route et découvrez des vins finement élaborés dans des caves historiques.',
                'Suivez un parcours de découverte des vins les plus prestigieux de la région.',
                'Laissez-vous emporter par la magie des paysages et des vins de cette route célèbre.',
                'Découvrez le secret des vignobles anciens et dégustez des vins rares et exquis.',
                'Traversez des terres viticoles exceptionnelles et goûtez des vins savoureux.',
                'Admirez le panorama des collines de vignes tout en savourant des vins de qualité.'
            ]),        ];
    }
}
