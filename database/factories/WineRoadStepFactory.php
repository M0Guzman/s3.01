<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\GPSCoordinate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WineRoadStep>
 */
class WineRoadStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $is_gps = fake()->boolean();

        return [
            'g_p_s_coordinate_id' => $is_gps ? GPSCoordinate::factory() : null,
            'address_id' => $is_gps ? null : Address::all()->random()->id,
            'name' => fake()->randomElement([
                'Point de vue panoramique',
                'Vignoble de la vallée',
                'Domaine historique',
                'Cave à vin pittoresque',
                'Château vinicole',
                'Vignoble du terroir',
                'Lieu de dégustation',
                'Établissement viticole',
                'Domaine du soleil levant',
                'Ancienne cave de vinification',
                'Atelier de production du vin',
                'Parc naturel de vignes',
                'Caveau de dégustation',
                'Chemin de vignes',
                'Panorama sur les vignes',
                'Domaine des grands crus',
                'Vignoble de montagne',
                'Vignoble historique',
                'Point de départ du circuit',
                'Route des vins'
            ]),
        ];
    }
}
