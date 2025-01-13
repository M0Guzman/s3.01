<?php

namespace Database\Seeders;

use App\Models\PartnerHasResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\OtherPartner;
use App\Models\Partner;
use App\Models\Restaurant;
use App\Models\WineCellar;
use App\Models\Address;
use App\Models\Resource;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i < 24;$i++){
            Resource::create([
                'filename' => $i . '.jpg',
                'mimetype' => 'image/jpg',
                'permission' => 'user.default'
            ]);
        }

        $partenaires = [
            [
                [
                    'name' => "Chateau du Vin", 
                    'description' => "un lieu prestigieux dédié à l'art de la dégustation. Avec une sélection soignée de vins fins et un cadre élégant, c’est l’endroit idéal pour découvrir des crus exceptionnels et en apprendre davantage sur le monde du vin."
                ],
                [
                    'name' => "La Cave Royale", 
                    'description' => "une expérience de dégustation raffinée dans un cadre historique. Découvrez une collection impressionnante de vins rares et précieux, soigneusement conservés et prêts à être savourés dans une atmosphère royale."
                ],
                [
                    'name' => "Domaine des Vignes", 
                    'description' => "une cave conviviale et accueillante où les passionnés de vin peuvent explorer une vaste sélection de vins issus de terroirs variés. Un lieu parfait pour les connaisseurs comme pour les néophytes, avec des conseils d'experts à chaque étape."
                ],
                [
                    'name' => "Caviste Gourmand", 
                    'description' => "un lieu où l'amour du vin se mêle à celui de la gastronomie. Vous y trouverez une sélection de vins d'exception, accompagnés de conseils avisés pour marier chaque cru à des mets raffinés."
                ],
                [
                    'name' => "La Route des Vins", 
                    'description' => "un lieu magique où l’on découvre des vins au caractère unique. Dans une ambiance chaleureuse et intime, plongez dans un univers de saveurs où chaque bouteille raconte l’histoire d’un terroir fascinant."
                ],
                [
                    'name' => "Domaine Enchante", 
                    'description' => "un espace où tradition et qualité se rencontrent. Avec une gamme variée de vins soigneusement sélectionnés, c’est l'endroit parfait pour les amateurs de bons crus à la recherche de nouvelles découvertes."
                ],
                [
                    'name' => "Cave Saint Pierre", 
                    'description' => "un lieu accueillant et chaleureux où l’on vous invite à explorer l’univers des vins fins. Chaque bouteille est sélectionnée avec soin, pour vous offrir une expérience inoubliable de dégustation."
                ],
                [
                    'name' => "Le Cellier du Terroir", 
                    'description' => "une cave intime et raffinée, mettant en valeur les vins de petits producteurs. Découvrez des crus uniques dans un cadre charmant, propice à la dégustation et à l’apprentissage sur l'art du vin."
                ],
                [
                    'name' => "La Cave des Grands Crus", 
                    'description' => "un lieu d'exception où se côtoient grands crus et vins rares. Dans un cadre somptueux, les passionnés de vin découvriront une collection impressionnante, prête à être dégustée ou à emporter."
                ],
                [
                    'name' => "Le Domaine des Vins Précieux", 
                    'description' => "un espace où les vins les plus prestigieux sont soigneusement stockés, prêts à être dégustés. La cave propose des crus rares et des éditions limitées, dans un environnement élégant et apaisant."
                ],
                [
                    'name' => "Les Caves de la Loire", 
                    'description' => "un lieu dédié à la passion du vin, avec une attention particulière portée aux vins de la région. Vous y trouverez des conseils d'experts et des découvertes qui raviront tous les amateurs de bons crus."
                ],
                [
                    'name' => "Cave des Sommeliers", 
                    'description' => "une cave moderne où les plus grands noms du vin sont à l'honneur. Explorez une vaste sélection de crus d’exception, tout en apprenant l’histoire des vignerons et des régions viticoles qui les produisent."
                ],
                [
                    'name' => "La Cave de Bacchus", 
                    'description' => "une cave à vin située au cœur des vignobles. Découvrez une sélection méticuleuse de vins locaux, parfaits pour les amateurs de dégustations authentiques et de découvertes œnologiques."
                ],
                [
                    'name' => "Le Clos des Vins", 
                    'description' => "un lieu où les passionnés de vin se retrouvent pour partager et découvrir des crus issus des meilleurs vignobles. Que vous soyez novice ou expert, vous y trouverez des conseils personnalisés et des vins exceptionnels."
                ],
                [
                    'name' => "Domaine des Ceps", 
                    'description' => "une cave spécialisée dans les vins rares et précieux. Elle propose une expérience de dégustation unique, avec un focus particulier sur les cépages anciens et les crus méconnus."
                ],
                [
                    'name' => "Les Vins du Château", 
                    'description' => "une cave au caractère authentique, où vous pouvez explorer les vins du terroir. Son atmosphère chaleureuse et son large choix de crus en font un lieu de prédilection pour les amoureux de la bonne dégustation."
                ],
                [
                    'name' => "Cave du Terroir", 
                    'description' => "un endroit où se mêlent la passion du vin et celle de l'art de vivre. La cave propose des vins locaux et étrangers, avec des dégustations accompagnées de mets délicieux pour enrichir l’expérience."
                ],
                [
                    'name' => "Le Panier à Vins", 
                    'description' => "une cave où tradition et innovation se rencontrent. Découvrez une vaste sélection de vins en provenance des quatre coins du monde, accompagnée de conseils d'experts pour affiner vos connaissances."
                ],
                [
                    'name' => "Les Caves du Soleil", 
                    'description' => "un lieu magique où le vin est roi. Vous y trouverez une sélection exceptionnelle de bouteilles, issues des plus beaux terroirs, dans une ambiance propice à la découverte et à la dégustation."
                ],
                [
                    'name' => "La Cave du Vigneron", 
                    'description' => "un espace où les grands crus se mêlent à l'authenticité. Offrant une sélection de vins raffinés et des conseils personnalisés, cette cave est le rendez-vous des amateurs de bons vins et de découvertes gustatives."
                ],
                [
                    'name' => "Les Vins de la Vallée", 
                    'description' => "une cave qui fait la part belle aux vins du sud, avec une large sélection de crus de la région. L’endroit idéal pour goûter des vins locaux dans une atmosphère détendue et conviviale."
                ],
                [
                    'name' => "La Cave de l'Abbaye", 
                    'description' => "une cave à la fois moderne et traditionnelle, où le vin est une véritable passion. Découvrez des crus rares et des vins de qualité, présentés dans un cadre agréable et chaleureux."
                ],
                [
                    'name' => "Cave de l'Orangerie", 
                    'description' => "un lieu dédié à l’univers du vin, offrant une expérience de dégustation unique. Chaque vin est sélectionné avec soin pour sa qualité et sa capacité à raconter l’histoire de son terroir."
                ],
                [
                    'name' => "Les Caves de la Montagne", 
                    'description' => "une cave située dans un ancien chai rénové, où l’histoire du vin est mise en valeur. Parfait pour découvrir des vins authentiques et traditionnels dans un cadre magique et intemporel."
                ],
                [
                    'name' => "La Cave des Papilles", 
                    'description' => "une cave spécialisée dans les vins bio et biodynamiques, mettant l’accent sur les méthodes de culture respectueuses de l’environnement. Idéale pour ceux qui cherchent des produits de qualité, mais aussi responsables."
                ],
                [
                    'name' => "Cave des Épicuriens", 
                    'description' => "un lieu où l’on se laisse emporter par l’art du vin. Chaque dégustation est une invitation à explorer des arômes et des saveurs nouveaux, dans une ambiance élégante et raffinée."
                ],
                [
                    'name' => "Les Secrets du Vin", 
                    'description' => "un endroit où l’on découvre le vin sous toutes ses formes. Du vin rouge au vin blanc, en passant par les rosés et les champagnes, cette cave vous propose un large choix de crus adaptés à tous les goûts."
                ]
            ],
            [
                [
                    'name' => "Le Calme des Vignes",
                    'description' => "Le Calme des Vignes vous accueille au cœur des vignobles pour un repas en toute tranquillité"
                ],
                [
                    'name' => "La Table de Montagne",
                    'description' => "Un restaurant avec une vue imprenable sur les Alpes, servant une cuisine savoyarde traditionnelle."
                ],
                [
                    'name' => "Les Saveurs de la Mer",
                    'description' => "Un lieu charmant où les poissons frais et fruits de mer sont à l'honneur dans une ambiance maritime."
                ],
                [
                    'name' => "Le Jardin Gourmand",
                    'description' => "Un restaurant au cœur d'un jardin luxuriant, offrant une cuisine bio et de saison."
                ],
                [
                    'name' => "La Brasserie du Parc",
                    'description' => "Située près d’un grand parc, cette brasserie propose une cuisine française moderne et conviviale."
                ],
                [
                    'name' => "L'Oasis de Provence",
                    'description' => "Venez découvrir une cuisine méditerranéenne dans un cadre apaisant et verdoyant, typiquement provençal."
                ],
                [
                    'name' => "La Cuisine de Mamie",
                    'description' => "Les recettes traditionnelles de grand-mère revisitées dans une ambiance chaleureuse et familiale."
                ],
                [
                    'name' => "Le Comptoir de l'Artisan",
                    'description' => "Ici, l'art culinaire rencontre l'authenticité, avec des plats préparés à partir de produits locaux de qualité."
                ],
                [
                    'name' => "L'Épicurienne",
                    'description' => "Un lieu où la gastronomie rencontre la convivialité, avec des menus raffinés à base de produits frais."
                ],
                [
                    'name' => "La Rôtisserie du Vieux Port",
                    'description' => "Un restaurant au bord de l'eau où l'on savoure des viandes rôties et des spécialités maritimes."
                ],
                [
                    'name' => "Le Gourmet Voyageur",
                    'description' => "Offrez-vous un voyage culinaire à travers les cuisines du monde, dans un cadre contemporain et raffiné."
                ],
                [
                    'name' => "Le Bistrot des Amis",
                    'description' => "Un bistrot convivial où les plats de bistrot traditionnels sont cuisinés avec des produits de saison."
                ],
                [
                    'name' => "Le Pavillon de la Mer",
                    'description' => "Un cadre élégant et raffiné pour découvrir les meilleurs fruits de mer et poissons de la région."
                ],
                [
                    'name' => "Les Quatre Saisons",
                    'description' => "Un restaurant qui offre des menus renouvelés à chaque saison, mettant en valeur les produits locaux."
                ],
                [
                    'name' => "Le Café des Artistes",
                    'description' => "Un lieu chic et créatif, parfait pour savourer une cuisine moderne inspirée des tendances actuelles."
                ],
                [
                    'name' => "La Taverne du Vieux Lyon",
                    'description' => "Venez découvrir les spécialités lyonnaises dans un cadre traditionnel et accueillant."
                ],
                [
                    'name' => "L'Atelier du Chef",
                    'description' => "Un restaurant où vous pouvez participer à la préparation de votre repas, guidé par des chefs expérimentés."
                ],
                [
                    'name' => "Le Relais des Pêcheurs",
                    'description' => "Un restaurant au bord du lac, où vous pouvez déguster une cuisine authentique de pêcheur dans un cadre idyllique."
                ],
                [
                    'name' => "Le Petit Comptoir",
                    'description' => "Un petit bistrot chaleureux qui vous propose une cuisine du marché, simple et savoureuse."
                ]
            ],
            [
                [
                    'name' => "Hotel de la Plage", 
                    'description' => "Situé à quelques pas de la mer, l'Hôtel de la Plage offre une vue imprenable sur l'océan. Son ambiance paisible et ses chambres confortables en font un lieu idéal pour se détendre et profiter de la brise marine."
                ],
                [
                    'name' => "Le Grand Hotel", 
                    'description' => "Élégant et prestigieux, Le Grand Hôtel allie luxe et confort. Offrant des chambres spacieuses, un service impeccable et une vue spectaculaire sur la ville, cet hôtel est parfait pour les voyageurs en quête de raffinement."
                ],
                [
                    'name' => "Villa des Roses", 
                    'description' => "Nichée dans un jardin luxuriant, la Villa des Roses est une demeure charmante qui combine l'authenticité et le confort. Avec son atmosphère chaleureuse, elle est le refuge idéal pour une escapade romantique ou un séjour reposant."
                ],
                [
                    'name' => "Chateau Luxe", 
                    'description' => "Découvrez l'élégance intemporelle au Château Luxe. Cet hôtel 5 étoiles, situé dans un cadre majestueux, propose des chambres somptueuses, un service haut de gamme et des installations de bien-être pour une expérience de luxe inoubliable."
                ],
                [
                    'name' => "Lodge des Cepages", 
                    'description' => "Entouré de vignobles, le Lodge des Cépages invite à une expérience paisible et immersive dans le monde du vin. Ses chambres élégantes et son atmosphère détendue offrent un cadre parfait pour les amateurs de vin et les amoureux de la nature." 
                ],
                [
                    'name' => "Hotel Bellevue", 
                    'description' => "Avec sa vue imprenable sur les montagnes, l'Hotel Bellevue offre un séjour de calme et de tranquillité. Son personnel accueillant et ses chambres modernes en font un choix parfait pour une escapade relaxante."
                ],
                [
                    'name' => "Le Jardin des Vignes", 
                    'description' => "Dans un cadre verdoyant et apaisant, Le Jardin des Vignes vous propose un séjour agréable au cœur de la nature. Ses chambres cosy et son environnement bucolique sont parfaits pour un séjour alliant détente et découverte des vins locaux."
                ],
                [
                    'name' => "Le Royal Paris", 
                    'description' => "Le Royal Paris est un hôtel de luxe situé au cœur de la capitale, offrant un service haut de gamme et des chambres élégantes. Il est idéal pour ceux qui cherchent à vivre l'expérience parisienne dans toute sa splendeur."
                ],
                [
                    'name' => "Palace du Mont Blanc", 
                    'description' => "Le Palace du Mont Blanc est un refuge de luxe situé dans les Alpes. Avec ses vues imprenables sur les montagnes et son atmosphère raffinée, c’est l'endroit idéal pour se ressourcer après une journée d'aventure."
                ],
                [
                    'name' => "Hotel des Arcs", 
                    'description' => "L'Hotel des Arcs est un chalet traditionnel situé au pied des pistes de ski. Son ambiance chaleureuse et son confort moderne en font un lieu incontournable pour les amoureux de la montagne et du ski."
                ],
                [
                    'name' => "Le Soleil d'Or", 
                    'description' => "Le Soleil d'Or est un hôtel de charme situé dans le sud de la France. Il vous invite à profiter d’un séjour ensoleillé dans un cadre naturel époustouflant, tout en dégustant des mets locaux délicieux."
                ],
                [
                    'name' => "Villa Méditerranée", 
                    'description' => "La Villa Méditerranée est un hôtel boutique, où l’art de vivre méditerranéen se mêle à l’élégance. Il vous offre une expérience luxueuse tout en étant à quelques pas de la mer, pour des vacances reposantes et raffinées."
                ],
                [
                    'name' => "Les Terrasses du Lac", 
                    'description' => "Les Terrasses du Lac offre une vue spectaculaire sur le lac et les montagnes environnantes. Cet hôtel vous permettra de profiter d’un séjour calme et paisible, avec un service de qualité exceptionnelle."
                ],
                [
                    'name' => "Le Manoir des Vins", 
                    'description' => "Le Manoir des Vins, situé au cœur des vignes, vous propose une expérience unique autour du vin. Séjournez dans un cadre idyllique, où chaque moment est un hommage aux meilleurs crus de la région."
                ],
                [
                    'name' => "L'Etoile d'Azur", 
                    'description' => "L'Etoile d'Azur est un hôtel de luxe sur la Côte d'Azur, avec des vues imprenables sur la mer Méditerranée. Son service impeccable et son design moderne en font l'un des meilleurs choix pour des vacances inoubliables."
                ],
                [
                    'name' => "Les Jardins du Luberon", 
                    'description' => "Les Jardins du Luberon vous offrent un séjour au cœur de la Provence. Profitez de l’ambiance tranquille et des chambres raffinées tout en explorant les marchés locaux et en dégustant la cuisine régionale."
                ],
                [
                    'name' => "Hotel des Champs-Elysées", 
                    'description' => "Hotel des Champs-Elysées est un hôtel chic et moderne situé à quelques pas des Champs-Élysées. C'est l'endroit rêvé pour un séjour parisien de luxe, avec des équipements haut de gamme et un service exceptionnel."
                ],
                [
                    'name' => "La Villa des Artistes", 
                    'description' => "La Villa des Artistes vous plonge dans une atmosphère artistique unique, avec des chambres décorées par des artistes locaux. Elle est parfaite pour les amoureux de la culture, de l'art et du design."
                ],
                [
                    'name' => "Le Refuge des Alpes", 
                    'description' => "Le Refuge des Alpes est un hôtel de montagne où vous pourrez profiter de la nature tout en bénéficiant d’un confort moderne. Avec ses services adaptés aux randonneurs et aux amoureux des sports d’hiver, il est parfait pour une escapade alpine."
                ],
                [
                    'name' => "La Maison des Vins", 
                    'description' => "La Maison des Vins est un hôtel au cœur d’une région viticole. Profitez de la découverte des grands crus, avec des chambres confortables et un cadre idyllique pour un séjour alliant détente et œnologie."
                ],
                [
                    'name' => "Le Prieuré du Val", 
                    'description' => "Le Prieuré du Val est un ancien monastère transformé en hôtel, offrant un cadre historique et tranquille. Idéal pour ceux qui cherchent à se ressourcer dans un environnement calme et spirituel."
                ],
                [
                    'name' => "Hôtel des Cèdres", 
                    'description' => "Hôtel des Cèdres, situé au bord d’un lac paisible, vous permet de profiter d’un cadre naturel tout en ayant accès à des installations modernes. Cet hôtel est parfait pour des vacances familiales ou une escapade en couple."
                ],
                [
                    'name' => "Le Chateau de la Loire", 
                    'description' => "Le Chateau de la Loire est un hôtel 5 étoiles offrant une expérience royale. Séjournez dans ce château majestueux et profitez de ses jardins, de ses équipements haut de gamme et de ses services d'exception."
                ],
                [
                    'name' => "Le Rive Gauche", 
                    'description' => "Le Rive Gauche est un hôtel moderne et élégant situé à proximité de la Seine. Avec sa décoration contemporaine et ses services de qualité, c’est le choix parfait pour un séjour en toute tranquillité à Paris."
                ],
                [
                    'name' => "Hotel des Platanes", 
                    'description' => "Hotel des Platanes est un hôtel charmant situé dans un cadre paisible, entouré de platanes centenaires. Il offre un environnement serein pour se détendre tout en profitant des magnifiques paysages environnants."
                ],
                [
                    'name' => "Le Mas de Provence", 
                    'description' => "Le Mas de Provence vous accueille dans un cadre typiquement provençal. Profitez de l’authenticité de la région avec un séjour dans cet hôtel, entre champs de lavande et oliveraies, pour une expérience unique."
                ]
            ],  
            [
                [
                    'name' => "Maison du Terroir", 
                    'description' => "découvrez les richesses des produits locaux dans un cadre authentique et chaleureux. Ici, le vin se marie avec les saveurs du terroir pour offrir une expérience gustative unique et enrichissante"
                ],
                [
                    'name' => "Auberge des Vins", 
                    'description' => "un lieu où l’art de la dégustation rencontre la convivialité. Avec une sélection soignée de vins et une cuisine simple mais savoureuse, cet établissement offre un cadre parfait pour les amateurs de bons repas et de bons crus."
                ],
                [
                    'name' => "Les Vendangeurs", 
                    'description' => "un lieu où le passionné de vin trouve son bonheur. Ce restaurant et cave à vin combine l'excellence des vins locaux et la qualité des produits du terroir pour offrir une expérience authentique et pleine de saveurs."
                ]
            ]
        ];


        Address::factory(100)->create();
        for ($i = 0; $i < count($partenaires); $i++) {
            foreach ($partenaires[$i] as $unPartenaire) {
                $nouveauPartner = Partner::create([
                    'activity_type_id' => $i+1,
                    'address_id' => Address::all()->random()->id,
                    'name' => $unPartenaire['name'],
                    'email' => fake()->companyEmail(),
                    'description' => $unPartenaire['description'],
                    'phone' => fake()->phoneNumber()
                ]);

                switch ($i) {
                    case 0:
                        WineCellar::factory(1)->state(['partner_id' => $nouveauPartner->id])->create();
                        PartnerHasResource::create([
                            'partner_id' => $nouveauPartner->id,
                            'resource_id' => rand(19,20)
                        ]);
                        break;
                        
                        
                    case 1:
                        Restaurant::factory(1)->state(['partner_id' => $nouveauPartner->id])->create();
                        PartnerHasResource::create([
                            'partner_id' => $nouveauPartner->id,
                            'resource_id' => rand(17,18)
                        ]);
                        break;
                        
                    case 2:
                        Hotel::factory(1)->state(['partner_id' => $nouveauPartner->id])->create();
                        PartnerHasResource::create([
                            'partner_id' => $nouveauPartner->id,
                            'resource_id' => rand(15,16)
                        ]);
                        break;
                        
                    case 3:
                        OtherPartner::factory(1)->state(['partner_id' => $nouveauPartner->id])->create();
                        PartnerHasResource::create([
                            'partner_id' => $nouveauPartner->id,
                            'resource_id' => rand(9,14)
                        ]);
                        break;
                }
            }
        }


    }
}
