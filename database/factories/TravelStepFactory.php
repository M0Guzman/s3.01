<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravelStep>
 */
class TravelStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $titles = [
            'Arrivée et accueil' => 'Accueillez-vous dans un cadre chaleureux et convivial. À votre arrivée, notre équipe se fera un plaisir de vous présenter en détail le programme de votre séjour, vous fournir toutes les informations nécessaires et vous guider tout au long de votre expérience viticole et culinaire.',
            'Visite des vignobles' => 'Plongez dans l’histoire fascinante du vin tout en découvrant les vignobles les plus prestigieux de la région. Apprenez les secrets de la culture des raisins, explorez les différents cépages et découvrez les méthodes de culture uniques qui font la richesse de la région viticole.',
            'Dégustation de vin' => 'Dégustez les vins les plus renommés de la région dans un cadre authentique, tout en écoutant l’histoire fascinante de chaque cru. Laissez-vous guider par un expert local qui vous apprendra les techniques de dégustation et les subtilités des arômes qui caractérisent chaque vin.',
            'Repas traditionnel' => 'Participez à un repas traditionnel dans une ambiance conviviale et chaleureuse. Vous dégusterez des produits locaux de qualité, soigneusement préparés par des chefs locaux, et accompagnés de vins régionaux sélectionnés pour sublimer chaque plat et enrichir l’expérience culinaire.',
            'Exploration de la cave' => 'Explorez les caves ancestrales où les meilleurs crus prennent naissance. Plongez dans l’univers du vin en découvrant les techniques de vinification traditionnelles et modernes. Vous aurez l’occasion de sentir les arômes et de comprendre comment chaque vin est soigneusement élaboré.',
            'Découverte du terroir local' => 'Partez à la découverte des richesses du terroir local. Accompagné d’un guide passionné, vous apprendrez comment le sol, le climat et les savoir-faire des vignerons influencent la qualité du vin. C’est l’occasion parfaite de comprendre la spécificité du terroir viticole local.',
            'Visite guidée des domaines' => 'Visitez des domaines viticoles d\'exception lors de visites guidées. Vous découvrirez les étapes cruciales du processus de production du vin, des vendanges à la mise en bouteille. Vous en apprendrez plus sur l’histoire et l’innovation dans la production des vins de cette région prestigieuse.',
            'Atelier de dégustation' => 'Participez à un atelier interactif où un sommelier expert vous guidera à travers les différentes étapes de la dégustation de vin. Apprenez à identifier les arômes, les saveurs et les textures uniques de chaque vin tout en affinant vos compétences et vos connaissances œnologiques.',
            'Promenade dans les vignes' => 'Faites une promenade pittoresque à travers les vignes, profitez des paysages environnants et apprenez comment chaque plante contribue à la qualité du vin produit dans la région. Découvrez les différents types de cépages et comment ils interagissent avec le climat local pour donner des vins uniques.',
            'Séance de relaxation' => 'Détendez-vous lors d’une séance de relaxation dans un cadre naturel et apaisant. Que ce soit en pratiquant le yoga ou simplement en vous imprégnant de la sérénité du lieu, cette pause bien-être vous permettra de vous ressourcer avant de poursuivre l’aventure œnotouristique avec enthousiasme.',
            'Dîner avec vue' => 'Dînez dans un cadre exceptionnel, avec une vue imprenable sur les vignes et les paysages alentours. Savourez des mets raffinés, préparés avec des produits locaux, et accompagnés des meilleurs vins de la région, offrant ainsi une expérience culinaire inoubliable en harmonie avec la nature.',
            'Rencontre avec les vignerons' => 'Rencontrez les vignerons locaux, apprenez leurs secrets de production et découvrez les histoires fascinantes derrière chaque bouteille de vin. Échangez avec eux sur leur passion, leurs méthodes de travail et leurs perspectives sur l’évolution du vin dans la région.',
            'Déjeuner en plein air' => 'Savourez un déjeuner en plein air, au cœur des vignes, avec des produits locaux frais et de saison. Accompagné de vins régionaux soigneusement sélectionnés, ce repas vous offrira une expérience culinaire authentique, tout en profitant du cadre pittoresque de la campagne viticole.',
            'Dégustation des grands crus' => 'Découvrez des grands crus lors d’une dégustation privée dans un cadre exceptionnel. Un expert vous guidera tout au long de cette expérience, vous apprenant à savourer les arômes subtils de ces vins rares et prestigieux, tout en explorant leur histoire et leur processus de fabrication.',
            'Excursion en montagne' => 'Profitez d’une excursion en montagne pour explorer les environs tout en dégustant un vin local. Ce moment unique vous permettra de découvrir des panoramas spectaculaires sur les vignobles et les paysages naturels tout en vous imprégnant des saveurs locales et des richesses du terroir.',
            'Balade en vélo électrique' => 'Faites une balade en vélo électrique à travers les vignes et les villages pittoresques. Laissez-vous emporter par la beauté des paysages, tout en profitant de l’air frais et de la nature environnante, tout en dégustant des vins locaux et en découvrant la culture viticole de la région.',
            'Visite des installations de vinification' => 'Visitez les installations modernes de vinification, découvrez les techniques de production du vin et apprenez comment les innovations technologiques contribuent à améliorer la qualité des crus. Vous comprendrez le processus complet de vinification, de la récolte des raisins à la mise en bouteille.',
            'Dîner gastronomique' => 'Dînez dans un restaurant gastronomique de renom, où des plats raffinés et créatifs sont préparés avec des ingrédients locaux. Chaque plat est soigneusement accompagné de vins fins, pour une expérience culinaire complète qui met en valeur les saveurs de la région et du terroir.',
            'Découverte des spécialités locales' => 'Découvrez les spécialités locales lors d’une expérience culinaire unique. Savourez une sélection de produits régionaux, tels que des fromages, des charcuteries et des pâtisseries, chacun étant parfaitement assorti avec les meilleurs vins locaux pour enrichir votre expérience gastronomique.',
            'Soirée de clôture' => 'Terminez votre séjour avec une soirée festive, où vous pourrez partager vos découvertes et impressions avec les autres invités. Profitez d’une dégustation finale des meilleurs vins, tout en célébrant cette expérience inoubliable dans une ambiance chaleureuse et conviviale.'
        ];

        // Sélection aléatoire d'un titre
        $randomTitle = fake()->randomElement(array_keys($titles));

        // Récupération de la description associée au titre
        $randomDescription = $titles[$randomTitle];

        return [
            'travel_id' => Travel::all()->random()->id,
            'title' => $randomTitle,
            'description' => $randomDescription
        ];
    }
}
