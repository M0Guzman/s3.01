<?php

namespace Database\Factories;

use App\Models\ActivityCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Partner;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->numberBetween(8, 18);
        $end = $start + fake()->numberBetween(1, 3);

        return [
            'partner_id' => random_int(1,Partner::count()),
            'activity_category_id' => ActivityCategory::all()->random()->id,
            'name' => fake()->randomElement([
                "Visite de vignoble", "Dégustation de vin", "Atelier d'oenologie", "Balade dans les vignes", "Cours de cuisine avec accord mets et vins",
                "Dîner gastronomique", "Découverte des cépages", "Visite de cave", "Rencontre avec un vigneron", "Séjour en château viticole",
                "Atelier de création de vin", "Pique-nique dans les vignes", "Festival du vin", "Conférence sur le vin", "Visite historique du domaine",
                "Soirée dégustation", "Visite guidée de la région viticole", "Découverte des accords fromages et vins", "Séminaire sur la viticulture",
                "Atelier sensoriel", "Visite de musée du vin", "Balade à cheval dans les vignobles", "Concert dans un domaine viticole",
                "Découverte des vins bio", "Dégustation verticale", "Atelier d'assemblage de vin", "Marché de produits locaux",
                "Week-end œnologique", "Atelier de mixologie avec vins", "Conférence sur les terroirs", "Séjour bien-être et vin",
                "Rallye des vins", "Escape game dans les vignes", "Initiation à la sommellerie", "Masterclass sur les vins rares",
                "Visite privée de château", "Vendanges participatives", "Atelier de cuisine du terroir", "Visite de distillerie",
                "Soirée accords chocolats et vins", "Atelier d'étiquetage de bouteilles", "Séjour œnotouristique personnalisé",
                "Projection de film dans les vignes", "Atelier de photographie dans les vignobles", "Séance de yoga dans les vignes",
                "Randonnée viticole", "Atelier de dégustation à l'aveugle", "Atelier de création d'étiquettes personnalisées",
                "Exposition d'art dans un domaine", "Atelier de peinture dans les vignes", "Soirée gastronomique à thème",
                "Brunch dans les vignes", "Visite de chai", "Initiation à la biodynamie", "Visite de tonnellerie",
                "Atelier de cocktails à base de vin", "Tour en montgolfière au-dessus des vignes", "Concert jazz dans un domaine",
                "Dégustation de vieux millésimes", "Week-end découverte des vins effervescents", "Tour en vélo électrique dans les vignobles",
                "Rencontre avec un sommelier", "Atelier de cuisine végétarienne et vins", "Visite des caves souterraines",
                "Soirée accords vins et fruits de mer", "Marché du vin et de la gastronomie", "Masterclass sur les vins étrangers",
                "Atelier de création de spiritueux", "Week-end truffes et vins", "Atelier de fabrication de tonneaux",
                "Dégustation de vins primés", "Conférence sur les vins naturels", "Atelier autour des vins de dessert",
                "Atelier d'accords chocolats et vins", "Dîner sous les étoiles dans un vignoble", "Brunch en domaine",
                "Découverte des vins du monde", "Visite de la route des vins", "Initiation aux vins effervescents",
                "Atelier de cocktails à base de champagne", "Dégustation commentée de vins premium", "Week-end prestige dans un domaine",
                "Conférence sur l'histoire du vin", "Atelier sur les accords mets-vins", "Visite privée des caves historiques",
                "Atelier de sculpture sur bouteille", "Découverte des métiers du vin", "Atelier de vendanges",
                "Week-end luxe et vin", "Tour en calèche dans les vignobles", "Atelier autour des vins rosés",
                "Séjour découverte des vins de la région", "Atelier dégustation à thème"
            ]),
            'description' => fake()->randomElement([
                "restaurant chaleureux situé au cœur de la ville, offrant une cuisine française traditionnelle avec une touche moderne. Ses plats raffinés sont préparés avec des ingrédients locaux et de saison, dans un cadre élégant et convivial."
            ]),
            'timeslot' => $start . "h00-" . $end . "h00",
            'adult_price' => fake()->randomFloat(2,100, 400),
            'children_price' => fake()->randomFloat(2,100, 400),
        ];
    }
}
