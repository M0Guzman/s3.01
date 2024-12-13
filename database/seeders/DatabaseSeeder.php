<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityCategory;
use App\Models\ActivityType;
use App\Models\CookingType;
use App\Models\Department;
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
use Illuminate\Database\Seeder;

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

        Department::create(['name' => 'Ain']);
        Department::create(['name' => 'Aisne']);
        Department::create(['name' => 'Allier']);
        Department::create(['name' => 'Alpes-de-Haute-Provence']);
        Department::create(['name' => 'Hautes-Alpes']);
        Department::create(['name' => 'Alpes-Maritimes']);
        Department::create(['name' => 'Ardèche']);
        Department::create(['name' => 'Ardennes']);
        Department::create(['name' => 'Ariège']);
        Department::create(['name' => 'Aube']);
        Department::create(['name' => 'Aude']);
        Department::create(['name' => 'Aveyron']);
        Department::create(['name' => 'Bouches-du-Rhône']);
        Department::create(['name' => 'Calvados']);
        Department::create(['name' => 'Cantal']);
        Department::create(['name' => 'Charente']);
        Department::create(['name' => 'Charente-Maritime']);
        Department::create(['name' => 'Cher']);
        Department::create(['name' => 'Corrèze']);
        Department::create(['name' => 'Côte-d Or']);
        Department::create(['name' => 'Cotes-d Armor']);
        Department::create(['name' => 'Creuse']);
        Department::create(['name' => 'Doubs']);
        Department::create(['name' => 'Drôme']);
        Department::create(['name' => 'Eure']);
        Department::create(['name' => 'Eure-et-Loir']);
        Department::create(['name' => 'Finistère']);
        Department::create(['name' => 'Gard']);
        Department::create(['name' => 'Haute-Garonne']);
        Department::create(['name' => 'Gers']);
        Department::create(['name' => 'Gironde']);
        Department::create(['name' => 'Hérault']);
        Department::create(['name' => 'Ille-et-Vilaine']);
        Department::create(['name' => 'Indre']);
        Department::create(['name' => 'Indre-et-Loire']);
        Department::create(['name' => 'Isère']);
        Department::create(['name' => 'Jura']);
        Department::create(['name' => 'Landes']);
        Department::create(['name' => 'Loir-et-Cher']);
        Department::create(['name' => 'Loire']);
        Department::create(['name' => 'Haute-Loire']);
        Department::create(['name' => 'Loire-Atlantique']);
        Department::create(['name' => 'Loiret']);
        Department::create(['name' => 'Lot']);
        Department::create(['name' => 'Lot-et-Garonne']);
        Department::create(['name' => 'Lozère']);
        Department::create(['name' => 'Maine-et-Loire']);
        Department::create(['name' => 'Manche']);
        Department::create(['name' => 'Marne']);
        Department::create(['name' => 'Haute-Marne']);
        Department::create(['name' => 'Mayenne']);
        Department::create(['name' => 'Meurthe-et-Moselle']);
        Department::create(['name' => 'Meuse']);
        Department::create(['name' => 'Morbihan']);
        Department::create(['name' => 'Moselle']);
        Department::create(['name' => 'Nièvre']);
        Department::create(['name' => 'Nord']);
        Department::create(['name' => 'Oise']);
        Department::create(['name' => 'Orne']);
        Department::create(['name' => 'Pas-de-Calais']);
        Department::create(['name' => 'Puy-de-Dôme']);
        Department::create(['name' => 'Pyrénées-Atlantiques']);
        Department::create(['name' => 'Hautes-Pyrénées']);
        Department::create(['name' => 'Pyrénées-Orientales']);
        Department::create(['name' => 'Bas-Rhin']);
        Department::create(['name' => 'Haut-Rhin']);
        Department::create(['name' => 'Rhône']);
        Department::create(['name' => 'Haute-Saône']);
        Department::create(['name' => 'Saône-et-Loire']);
        Department::create(['name' => 'Sarthe']);
        Department::create(['name' => 'Savoie']);
        Department::create(['name' => 'Haute-Savoie']);
        Department::create(['name' => 'Paris']);
        Department::create(['name' => 'Seine-Maritime']);
        Department::create(['name' => 'Seine-et-Marne']);
        Department::create(['name' => 'Yvelines']);
        Department::create(['name' => 'Deux-Sèvres']);
        Department::create(['name' => 'Somme']);
        Department::create(['name' => 'Tarn']);
        Department::create(['name' => 'Tarn-et-Garonne']);
        Department::create(['name' => 'Var']);
        Department::create(['name' => 'Vaucluse']);
        Department::create(['name' => 'Vendée']);
        Department::create(['name' => 'Vienne']);
        Department::create(['name' => 'Haute-Vienne']);
        Department::create(['name' => 'Vosges']);
        Department::create(['name' => 'Yonne']);
        Department::create(['name' => 'Territoire de Belfort']);
        Department::create(['name' => 'Essonne']);
        Department::create(['name' => 'Hauts-de-Seine']);
        Department::create(['name' => 'Seine-Saint-Denis']);
        Department::create(['name' => 'Val-de-Marne']);
        Department::create(['name' => 'Val-d Oise']);
        Department::create(['name' => 'Guadeloupe']);
        Department::create(['name' => 'Martinique']);
        Department::create(['name' => 'Guyane']);
        Department::create(['name' => 'La Réunion']);
        Department::create(['name' => 'Mayotte']);
        Department::create(['name' => 'Saint-Pierre-et-Miquelon']);
        Department::create(['name' => 'Wallis-et-Futuna']);
        Department::create(['name' => 'Polynésie française']);
        Department::create(['name' => 'Nouvelle-Calédonie']);
        Department::create(['name' => 'Îles Kerguelen (TAAF)']);

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

        UserRole::create(['name' => 'User']);
        UserRole::create(['name' => 'Partner']);
        UserRole::create(['name' => 'Admin']);

        RolePermission::create(['name' => 'user.is_admin', 'value' => true, 'user_role_id' => 2]);

        OtherPartnerActivityType::create(['name' => 'tmp_plz_fix']);
        OrderState::create(['name' => 'En attente']);
        OrderState::create(['name' => 'En cours de livraison']);
        OrderState::create(['name' => 'Livree']);
        OrderState::create(['name' => 'Annule']);

        SamplingType::create(['name'=> 'Degustation dans une cave']);
    }
}
