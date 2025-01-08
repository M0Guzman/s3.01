<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityCategory;
use App\Models\ActivityType;
use App\Models\CookingType;
use App\Models\Department;
use App\Models\City;
use App\Models\OrderState;
use App\Models\OtherPartnerActivityType;
use App\Models\ParticipantCategory;
use App\Models\PaymentType;
use App\Models\RolePermission;
use App\Models\SamplingType;
use App\Models\Theme;
use App\Models\TravelCategory;
use App\Models\UserRole;
use App\Models\VineyardCategory;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //

        ActivityCategory::create(['name' => 'Dégustation et dégustation commentée']);
        ActivityCategory::create(['name' => 'Visites et balades']);
        ActivityCategory::create(['name' => 'Ateliers œnologiques']);
        ActivityCategory::create(['name' => 'Repas et pique-niques']);
        ActivityCategory::create(['name' => 'Initiations et découvertes']);

        ActivityType::create(['name' => 'Cave']);
        ActivityType::create(['name' => 'Restaurant']);
        ActivityType::create(['name' => 'Hotel']);
        ActivityType::create(['name' => 'Autres']);




        //php artisan db:seed --class DatabaseSeeder

        $department_JSON = json_decode(file_get_contents('resources/data/department.json'),true);

        foreach($department_JSON as $undepartment) {
            Department::create([
                'name' => $undepartment['dep_name'],
                'id' => intval($undepartment['num_dep'])
            ]);
        }


        $addresses_JSON = json_decode(file_get_contents('resources/data/cities.json'),true);

        foreach($addresses_JSON['cities'] as $city) {
            try {
                City::create([
                    'name' => $city['city_name'],
                    'zip' => $city['zip_code'],
                    'department_id' => $city['department_number'],
                    'latitude' => $city['latitude'],
                    'longitude' => $city['longitude']
                ]);
            }
            catch(Exception $e) {}
        }



        ParticipantCategory::create(['name' => 'famille']);
        ParticipantCategory::create(['name' => 'couple']);
        ParticipantCategory::create(['name' => 'Amis']);

        TravelCategory::create(['name' => 'bien etre']);
        TravelCategory::create(['name' => 'culture']);
        TravelCategory::create(['name' => 'gastronomie']);
        TravelCategory::create(['name' => 'golf']);
        TravelCategory::create(['name' => 'bio']);
        TravelCategory::create(['name' => 'insolite']);
        TravelCategory::create(['name' => 'toutes les envies']);

        VineyardCategory::create(['name' => 'Vallée du rhône']);
        VineyardCategory::create(['name' => 'Alsace']);
        VineyardCategory::create(['name' => 'Beaujolais']);
        VineyardCategory::create(['name' => 'Bordeaux']);
        VineyardCategory::create(['name' => 'bourgogne']);
        VineyardCategory::create(['name' => 'Catalogne']);
        VineyardCategory::create(['name' => 'Champagne']);
        VineyardCategory::create(['name' => 'Jura']);
        VineyardCategory::create(['name' => 'Languedoc-roussilon']);
        VineyardCategory::create(['name' => 'Paris']);
        VineyardCategory::create(['name' => 'Provence']);
        VineyardCategory::create(['name' => 'Savoie']);
        VineyardCategory::create(['name' => 'Sud-ouest']);
        VineyardCategory::create(['name' => 'Val de loire']);

        PaymentType::create(['name' => 'CB']);
        PaymentType::create(['name' => 'Paypal']);
        PaymentType::create(['name' => 'Stripe']);


        CookingType::create(['name' => 'Dégustation de vins blancs']);
        CookingType::create(['name' => 'Dégustation de vins rosés']);
        CookingType::create(['name' => 'Dégustation de vins mousseux']);
        CookingType::create(['name' => 'Dégustation de vins bio']);
        CookingType::create(['name' => 'Dégustation de vins premium']);
        CookingType::create(['name' => 'Dégustation de champagnes']);
        CookingType::create(['name' => 'Dégustation de vins de garde']);
        CookingType::create(['name' => 'Dégustation de vins doux']);
        CookingType::create(['name' => 'Dégustation de vins locaux']);


        UserRole::create(['id' => 1,'display_name' => 'Utilisateur', 'name'=>'user']);
        UserRole::create(['id' => 2,'display_name' => 'Service ventes', 'name' => 'sales_department']);
        UserRole::create(['id' => 3,'display_name' => 'Directeur service ventes', 'name'=> 'sales_department_director']);
        UserRole::create(['id' => 4,'display_name' => 'Service marketing', 'name' => 'marketing_department']);
        UserRole::create(['id' => 5,'display_name' => 'Dirigeant', 'name' => 'executive']);
        UserRole::create(['id' => 6,'display_name' => 'Partenaire', 'name' => 'partner']);

        OtherPartnerActivityType::create(['name' => 'tmp_plz_fix']);
        OrderState::create(['name' => 'En attente']);
        OrderState::create(['name' => 'En cours de livraison']);
        OrderState::create(['name' => 'Livree']);
        OrderState::create(['name' => 'Annule']);

        SamplingType::create(['name'=> 'Degustation dans une cave']);
    }
}
