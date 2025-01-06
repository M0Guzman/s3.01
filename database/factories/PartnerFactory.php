<?php

namespace Database\Factories;

use App\Models\ActivityType;
use App\Models\Address;
use App\Models\Hotel;
use App\Models\OtherPartner;
use App\Models\Partner;
use App\Models\Restaurant;
use App\Models\WineCellar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $activityType = ActivityType::all()->random();
        $name = "";

        switch ($activityType->name) {
            case 'Hotel':
                $name = fake()->randomElement([
                    "Hotel de la Plage", "Le Grand Hotel", "Villa des Roses", "Chateau Luxe", "Lodge des Cepages",
                    "Hotel Bellevue", "Le Jardin des Vignes"
                ]);
                $description = fake()->randomElement([
                    "Situé à quelques pas de la mer, l'Hôtel de la Plage offre une vue imprenable sur l'océan. Son ambiance paisible et ses chambres confortables en font un lieu idéal pour se détendre et profiter de la brise marine.",
                    "Élégant et prestigieux, Le Grand Hôtel allie luxe et confort. Offrant des chambres spacieuses, un service impeccable et une vue spectaculaire sur la ville, cet hôtel est parfait pour les voyageurs en quête de raffinement.",
                    "Nichée dans un jardin luxuriant, la Villa des Roses est une demeure charmante qui combine l'authenticité et le confort. Avec son atmosphère chaleureuse, elle est le refuge idéal pour une escapade romantique ou un séjour reposant.",
                    "Découvrez l'élégance intemporelle au Château Luxe. Cet hôtel 5 étoiles, situé dans un cadre majestueux, propose des chambres somptueuses, un service haut de gamme et des installations de bien-être pour une expérience de luxe inoubliable.",
                    "Entouré de vignobles, le Lodge des Cépages invite à une expérience paisible et immersive dans le monde du vin. Ses chambres élégantes et son atmosphère détendue offrent un cadre parfait pour les amateurs de vin et les amoureux de la nature.",
                    "Avec sa vue imprenable sur les montagnes, offre un séjour de calme et de tranquillité. Son personnel accueillant et ses chambres modernes en font un choix parfait pour une escapade relaxante.",
                    "Dans un cadre verdoyant et apaisant, Le Jardin des Vignes vous propose un séjour agréable au cœur de la nature. Ses chambres cosy et son environnement bucolique sont parfaits pour un séjour alliant détente et découverte des vins locaux."
                ]);
                break;
            case 'Restaurant':
                $name = fake()->randomElement([
                    "Le Gourmet", "Chez Pierre", "La Belle Table", "Vino Resto", "Le Bistrot du Vin", "Les Saveurs de Provence",
                    "La Cantine du Terroir", "Cafe des Amis"
                ]);
                $description = fake()->randomElement([
                    "une expérience culinaire raffinée où chaque plat est une œuvre d'art. Avec une carte inspirée des classiques français, ce restaurant propose une cuisine de qualité, dans un cadre élégant et chaleureux.",
                    "L'authenticité de la cuisine française traditionnelle dans une ambiance conviviale. Des plats généreux, faits maison et savoureux, parfaits pour partager un bon moment en famille ou entre amis.",
                    "savourer une cuisine moderne et délicate, réalisée à partir d'ingrédients frais et de saison. Le cadre élégant et raffiné fait de chaque repas une véritable célébration des saveurs.",
                    "l'honneur la cuisine de saison, simple et savoureuse, avec des produits locaux soigneusement sélectionnés. Dans une ambiance décontractée et authentique, chaque plat raconte l’histoire du terroir.",
                    "combine une cuisine gourmande et une carte des vins soigneusement sélectionnée. Avec une ambiance décontractée et une passion pour les bons produits, c’est l'endroit idéal pour les amateurs de bons repas et de vins.",
                    "une expérience culinaire simple mais savoureuse, où la cuisine du terroir se marie parfaitement avec une sélection de vins locaux. Un lieu chaleureux pour les amoureux de la bonne table et des bons crus.",
                    "des plats inspirés de la cuisine méditerranéenne. Savourez des recettes traditionnelles à base d’ingrédients locaux et laissez-vous envoûter par les arômes du sud."
                ]);
                break;
            case 'Cave':
                $name = fake()->randomElement([
                    "Chateau du Vin", "La Cave Royale", "Domaine des Vignes", "Caviste Gourmand", "La Route des Vins",
                    "Domaine Enchante", "Cave Saint Pierre"
                ]);
                $description = fake()->randomElement([
                    "un lieu prestigieux dédié à l'art de la dégustation. Avec une sélection soignée de vins fins et un cadre élégant, c’est l’endroit idéal pour découvrir des crus exceptionnels et en apprendre davantage sur le monde du vin.",
                    "une expérience de dégustation raffinée dans un cadre historique. Découvrez une collection impressionnante de vins rares et précieux, soigneusement conservés et prêts à être savourés dans une atmosphère royale.",
                    "une cave conviviale et accueillante où les passionnés de vin peuvent explorer une vaste sélection de vins issus de terroirs variés. Un lieu parfait pour les connaisseurs comme pour les néophytes, avec des conseils d'experts à chaque étape.",
                    "un lieu où l'amour du vin se mêle à celui de la gastronomie. Vous y trouverez une sélection de vins d'exception, accompagnés de conseils avisés pour marier chaque cru à des mets raffinés.",
                    "un lieu magique où l’on découvre des vins au caractère unique. Dans une ambiance chaleureuse et intime, plongez dans un univers de saveurs où chaque bouteille raconte l’histoire d’un terroir fascinant.",
                    "un espace où tradition et qualité se rencontrent. Avec une gamme variée de vins soigneusement sélectionnés, c’est l'endroit parfait pour les amateurs de bons crus à la recherche de nouvelles découvertes."
                ]);
                break;
            default:
                $name = fake()->randomElement([
                    "Maison du Terroir", "Auberge des Vins", "Les Vendangeurs"
                ]);
                $description = fake()->randomElement([
                    "découvrez les richesses des produits locaux dans un cadre authentique et chaleureux. Ici, le vin se marie avec les saveurs du terroir pour offrir une expérience gustative unique et enrichissante",
                    "un lieu où l’art de la dégustation rencontre la convivialité. Avec une sélection soignée de vins et une cuisine simple mais savoureuse, cet établissement offre un cadre parfait pour les amateurs de bons repas et de bons crus.",
                    "un lieu où le passionné de vin trouve son bonheur. Ce restaurant et cave à vin combine l'excellence des vins locaux et la qualité des produits du terroir pour offrir une expérience authentique et pleine de saveurs.",
                ]);
                break;
        }

        return [
            'activity_type_id' => ActivityType::all()->random()->id,
            'address_id' => Address::all()->random()->id,
            'name' => $name,
            'email' => fake()->companyEmail(),
            'description' => $description,
            'phone' => fake()->phoneNumber()
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function(Partner $partner) {
            if($partner->activity_type->name == 'Hotel') {
                Hotel::factory(1)->state(['partner_id' => $partner->id])->create();
            } elseif($partner->activity_type->name == 'Restaurant') {
                Restaurant::factory(1)->state(['partner_id' => $partner->id])->create();
            } elseif($partner->activity_type->name == 'Cave') {
                WineCellar::factory(1)->state(['partner_id' => $partner->id])->create();
            } else {
                OtherPartner::factory(1)->state(['partner_id' => $partner->id])->create();
            }
        });
    }
}
