<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Resource;
use App\Models\Review;
use App\Models\Travel;
use App\Models\TravelStep;
use App\Models\User;
use App\Models\WineRoad;
use Database\Factories\WineRoadFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resource::factory(10)->create();
        Address::factory(1000)->create();
        Activity::factory(30)->create();
        WineRoad::factory(20)->hasWineRoadSteps(3)->hasResources(1)->create();
        Travel::factory(50)->hasResources(2)->create();
        WineRoad::factory(1)->hasWineRoadSteps(3)->hasResources(1)->create();
        User::factory(50)->hasAddresses(1)->create();
        TravelStep::factory(200)->hasResources(2)->hasActivities(3)->create();
        Order::factory(30)->hasBookings(2)->create();
        Order::factory(1)->state(['created_at' => Carbon::now()])->hasBookings(25)->create();
        Coupon::factory(10)->hasOrder(1)->create();
        //Review::factory(100)->create();

        $titles = [
            'Excellent séjour dans le Bordelais',
            'Visite agréable mais un peu chère',
            'Découverte des vins de la Bourgogne',
            'Escapade dans le Languedoc-Roussillon',
            'Déçu par la qualité des vins',
            'Magnifique découverte du Beaujolais',
            'Visite agréable dans le Rhône',
            'Séjour moyen dans le Jura',
            'Coup de coeur pour les vins de la Champagne',
            'Visite décevante en Alsace',
            'Superbe escapade dans le Val de Loire',
            'Découverte réussie des vins corses',
            'Excellent séjour dans le Bordelais'
        ];

        $descriptions = [
            'J ai vraiment apprécié la visite du domaine viticole et les dégustations de leurs meilleurs crus.',
            'Le domaine était beau mais les tarifs étaient un peu élevés à mon goût.',
            'J ai adoré cette visite qui m a permis de mieux comprendre les spécificités des vins de la région.',
            'Le domaine était magnifique et les vins étaient de très haute qualité. Une expérience inoubliable.',
            'Malheureusement, les vins proposés lors de la dégustation n étaient pas à la hauteur de mes attentes.',
            'J ai été impressionné par la diversité et la qualité des vins proposés lors de cette visite.',
            'Très bonne expérience, le guide était très compétent et passionné.',
            'Malgré de beaux paysages, les vins proposés n ont pas répondu à mes attentes.',
            'Magnifique découverte des meilleurs champagnes de la région, une expérience unique.',
            'Malgré de beaux paysages, les vins proposés n étaient pas à la hauteur de ma visite.',
            'J ai particulièrement apprécié la diversité des vins proposés lors de cette visite.',
            'Une très belle expérience qui m a permis de découvrir les spécificités des vins de Corse.',
            'J ai vraiment apprécié la visite du domaine viticole et les dégustations de leurs meilleurs crus.'
        ];

        for($i = 0; $i < 400; $i++) {
            $index = fake()->numberBetween(0, count($titles)) % count($titles);
            Review::create([
                'travel_id' => Travel::all()->random()->id,
                'user_id' => User::all()->random()->id,
                'rating' => fake()->randomFloat(1, 1, 5),
                'title' => $titles[$index],
                'description' => $descriptions[$index]
            ]);
        }


    }
}
