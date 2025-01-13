<?php

namespace Database\Seeders;

use Codewithkyrian\ChromaDB\Facades\ChromaDB;
use Cloudstudio\Ollama\Facades\Ollama;
use Codewithkyrian\ChromaDB\Resources\CollectionResource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChromaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_collections = ChromaDB::listCollections();
        foreach($all_collections as $collection) {
            if($collection->name == 'chatbot') {
                ChromaDB::deleteCollection($collection->name);
            }
        }

        $collection = ChromaDB::createCollection('chatbot');
        $this->addToCollection($collection, "Bonjour", "Bonjour, Que pouvont nous faire poure vous ?");
        $this->addToCollection($collection, "Que faire si je ne parviens pas à me connecter à mon compte ?", "Si vous ne parvenez pas à vous connecter, vérifiez d'abord vos identifiants et votre mot de passe. Si le problème persiste, vous pouvez utiliser la fonction de réinitialisation du mot de passe ou contacter le support.");
        $this->addToCollection($collection, "Que faire si mon mot de passe ne fonctionne pas ?", "Si votre mot de passe ne fonctionne pas, vous pouvez utiliser l'option 'Mot de passe oublié' pour le réinitialiser par email.");
        $this->addToCollection($collection, "Mon adresse e-mail est obsolète, que faire ?", "Vous pouvez mettre à jour votre adresse e-mail dans les paramètres de votre compte ou contacter le support client pour effectuer la modification.");
        $this->addToCollection($collection, "Comment modifier mes informations personnelles ?", "Pour modifier vos informations personnelles, connectez-vous à votre compte et accédez à la section 'Mes informations' dans les paramètres.");
        $this->addToCollection($collection, "Comment sécuriser mon compte ? (Double authentification)", "Pour sécuriser votre compte, vous pouvez activer la double authentification dans les paramètres de sécurité de votre compte.");
        $this->addToCollection($collection, "Comment consulter l'historique de mes commandes ?", "Vous pouvez consulter l'historique de vos commandes dans votre espace personnel, sous la rubrique 'Mes commandes'.");
        $this->addToCollection($collection, "Comment consulter l’historique de mes avis ?", "L'historique de vos avis peut être consulté dans la section 'Mes avis' de votre compte.");
        $this->addToCollection($collection, "Comment passer une commande ?", "Pour passer une commande, sélectionnez les produits ou services que vous souhaitez acheter, ajoutez-les à votre panier et suivez les instructions pour finaliser votre commande.");
        $this->addToCollection($collection, "Puis-je annuler ma commande ?", "Les annulations de commandes sont possibles dans certains cas. Veuillez consulter les conditions de retour ou contacter le support si nécessaire.");
        $this->addToCollection($collection, "Comment suivre l'état de ma commande ?", "Vous pouvez suivre l'état de votre commande dans votre compte, sous la rubrique 'Mes commandes'. Un lien de suivi vous sera fourni si disponible.");
        $this->addToCollection($collection, "Pourquoi ma commande est-elle en attente ou annulée ?", "Si votre commande est en attente ou annulée, cela peut être dû à un problème de stock, de paiement ou à une demande d'annulation. Contactez le support pour plus d'informations.");
        $this->addToCollection($collection, "Comment choisir le mode de paiement ?", "Lors du processus de commande, vous pouvez choisir parmi les modes de paiement proposés, tels que carte bancaire, PayPal, ou autres options disponibles.");
        $this->addToCollection($collection, "Comment voir les avis d’un séjour ?", "Les avis des séjours peuvent être consultés sur la page de chaque séjour, dans la section 'Avis'.");
        $this->addToCollection($collection, "Comment signaler un avis ?", "Pour signaler un avis, cliquez sur l'option 'Signaler' à côté de l'avis concerné et suivez les instructions.");
        $this->addToCollection($collection, "Comment réserver un séjour œnotourisme ?", "Pour réserver un séjour œnotourisme, rendez-vous dans la page Tout nos séjours disponible via le rubans en haut de page. Une fois qu'un séjour vous plait vous pouvez l'ajouter au panier.");
        $this->addToCollection($collection, "Comment choisir mon séjour ?", "Vous pouvez choisir votre séjour en filtrant selon vos préférences (domaine, activité, type de séjour, etc.) sur la page de réservation.");
        $this->addToCollection($collection, "Puis-je réserver un séjour pour un groupe ?", "Oui, il est possible de réserver un séjour pour un groupe. Vous pouvez choisir un nombre d'adultes et enfants ou contacter le support pour des réservations de groupe.");
        $this->addToCollection($collection, "Comment personnaliser mon séjour ?", "Pour personnaliser votre séjour, vous pouvez choisir des activités supplémentaires, des visites privées ou des options spécifiques lors de la réservation.");
        $this->addToCollection($collection, "Comment vérifier la disponibilité de mon séjour ?", "La disponibilité d'un séjour peut être vérifiée directement sur la page de réservation, où un calendrier est mis à jour en temps réel.");
        $this->addToCollection($collection, "Quelle est la politique d'annulation d'un séjour ?", "La politique d'annulation d'un séjour dépend des conditions spécifiques de chaque réservation. Vous trouverez ces informations lors de la réservation ou dans vos confirmations.");
        $this->addToCollection($collection, "Puis-je choisir les vignerons ou les domaines à visiter ?", "Oui, il est possible de choisir les vignerons ou domaines que vous souhaitez visiter en sélectionnant les options disponibles lors de la réservation.");
        $this->addToCollection($collection, "Comment personnaliser les activités pendant le séjour ?", "Vous pouvez personnaliser vos activités pendant le séjour en sélectionnant des options supplémentaires (dégustations, visites, ateliers) lors de votre réservation.");
        $this->addToCollection($collection, "Comment savoir si un séjour inclut des repas ou des dégustations ?", "Les informations concernant les repas ou dégustations inclus dans un séjour sont généralement précisées dans la description du séjour sur la page de réservation.");
        $this->addToCollection($collection, "Puis-je organiser un événement spécial pendant mon séjour ?", "Oui, vous pouvez organiser un événement spécial en contactant le support ou le domaine avant ou pendant votre réservation pour vérifier les disponibilités.");
        $this->addToCollection($collection, "Puis-je avoir une visite privée dans un vignoble ?", "Oui, vous pouvez organiser une visite privée dans un vignoble. Cela peut être sélectionné comme option lors de votre réservation.");
        $this->addToCollection($collection, "Que faire si je n’ai pas reçu mon mail de confirmation ?", "Si vous n'avez pas reçu de mail de confirmation, vérifiez votre dossier de spam ou contactez le support pour vérifier l'état de votre commande ou réservation.");
        $this->addToCollection($collection, "Comment suivre la livraison de ma commande ?", "Vous pouvez suivre la livraison de votre commande en consultant le numéro de suivi envoyé par email ou en vous rendant dans l'historique de vos commandes.");
        $this->addToCollection($collection, "Est-il possible de changer l'adresse de facturation ?", "Il est possible de modifier l'adresse de facturation en vous rendant dans la section 'Mon compte' avant la finalisation de la commande.");
        $this->addToCollection($collection, "Puis-je faire livrer mes produits à un hôtel pendant mon séjour ?", "Oui, vous pouvez faire livrer vos produits à un hôtel pendant votre séjour en fournissant l'adresse de l'hôtel lors de la commande.");
        $this->addToCollection($collection, "Comment offrir un cadeau à quelqu'un ?", "Pour offrir un cadeau, sélectionnez le produit que vous souhaitez offrir et choisissez l'option 'Offrir en cadeau' lors du passage en caisse.");
        $this->addToCollection($collection, "Comment offrir un séjour en cadeau ?", "Pour offrir un séjour en cadeau, vous pouvez acheter un bon cadeau que la personne pourra utiliser pour réserver son séjour.");
        $this->addToCollection($collection, "Que faire si le cadeau que j’ai reçu est incorrect ?", "Si le cadeau que vous avez reçu est incorrect, contactez le support pour organiser un échange ou un remboursement.");
        $this->addToCollection($collection, "Comment envoyer une carte cadeau par email ?", "Pour envoyer une carte cadeau par email, vous devez choisir l'option 'Envoyer par email' lors de l'achat de la carte cadeau.");
        $this->addToCollection($collection, "Comment prolonger la validité d’un bon cadeau ?", "La validité d’un bon cadeau ne peut pas toujours être prolongée, mais vous pouvez contacter le support pour discuter d'une solution possible.");
        $this->addToCollection($collection, "Comment contacter le support ?", "Vous pouvez contacter le support en envoyant un message via la page 'Contactez-nous' ou par téléphone, selon les options disponibles.");
        $this->addToCollection($collection, "Comment déposer une réclamation ?", "Pour déposer une réclamation, contactez le support client par email ou via le formulaire de réclamation sur notre site.");
        $this->addToCollection($collection, "Existe-t-il un numéro gratuit pour joindre le support ?", "Oui, vous pouvez appelez au 07 66 69 71 18 pour joindre le support.");
        $this->addToCollection($collection, "Comment suivre l’avancement de ma réclamation ?", "Pour suivre l'avancement de votre réclamation, vous pouvez vous connecter à votre compte et consulter l'historique des réclamations ou contacter le support.");
        $this->addToCollection($collection, "Comment publier un avis sur un séjour ?", "Pour publier un avis, vous pouvez accéder à la page du séjour concerné et laisser un commentaire dans la section 'Avis'.");
        $this->addToCollection($collection, "Que faire si je souhaite modifier mon avis ?", "Si vous souhaitez modifier un avis, vous pouvez le faire en accédant à votre compte et en modifiant le commentaire laissé.");
        $this->addToCollection($collection, "Comment savoir si un avis est authentique ?", "Les avis authentiques proviennent de clients ayant réellement séjourné ou acheté. Vous pouvez vérifier la véracité des avis dans votre espace client.");
        $this->addToCollection($collection, "Puis-je naviguer sur le site sans créer de compte ?", "Oui, vous pouvez naviguer sur le site sans créer de compte, mais un compte est nécessaire pour effectuer une commande ou réserver un séjour.");
        $this->addToCollection($collection, "Comment accéder à mes données personnelles ?", "Vous pouvez accéder à vos données personnelles en vous rendant dans la section 'Mon compte' et en choisissant l'option 'Données personnelles'.");
        $this->addToCollection($collection, "Comment mettre à jour mes informations personnelles ?", "Pour mettre à jour vos informations, connectez-vous à votre compte, allez dans 'Mes informations' et effectuez les modifications souhaitées.");
        $this->addToCollection($collection, "Est-ce que mes informations sont partagées avec des tiers ?", "Nous respectons votre confidentialité. Vos informations ne sont partagées avec des tiers que si nécessaire pour le traitement de vos commandes ou conformément à nos conditions de confidentialité.");
        $this->addToCollection($collection, "Comment protéger mes informations bancaires ?", "Nous utilisons des technologies de sécurité avancées pour protéger vos informations bancaires, telles que le cryptage SSL.");
        $this->addToCollection($collection, "Comment vérifier les conditions de confidentialité ?", "Vous pouvez consulter nos conditions de confidentialité dans le pied de page du site, sous la section 'Politique de confidentialité'.");
        $this->addToCollection($collection, "Comment retourner un produit ou un séjour ?", "Pour retourner un produit ou annuler un séjour, veuillez consulter notre politique de retour et contactez le support pour organiser le retour.");
        $this->addToCollection($collection, "Que faire si mon séjour ne correspond pas à ce que j'avais réservé ?", "Si votre séjour ne correspond pas à la réservation, contactez immédiatement le support client pour résoudre le problème.");
        $this->addToCollection($collection, "Puis-je demander un remboursement si je ne suis pas satisfait ?", "Si vous n'êtes pas satisfait de votre commande ou séjour, contactez le support pour demander un remboursement ou un échange selon nos conditions.");
        $this->addToCollection($collection, "Comment résoudre un problème de litige avec un prestataire ?", "Pour résoudre un litige avec un prestataire, contactez le support client, qui pourra intervenir pour trouver une solution appropriée.");
        $this->addToCollection($collection, "Que faire si je n'arrive pas à accéder au site ?", "Si vous n'arrivez pas à accéder au site, vérifiez votre connexion internet, videz votre cache ou contactez le support si le problème persiste.");
        $this->addToCollection($collection, "Pourquoi le site est-il parfois lent ?", "Le site peut être lent en raison d'une forte affluence de visiteurs ou de problèmes techniques temporaires. Veuillez essayer plus tard.");
        $this->addToCollection($collection, "Est-ce que les prix affichés incluent toutes les taxes ?", "Oui, les prix affichés sur le site incluent toutes les taxes applicables, sauf indication contraire.");
        $this->addToCollection($collection, "Existe-t-il des réductions pour les membres fidèles ?", "Des réductions peuvent être proposées aux membres fidèles ou abonnés. Vérifiez les offres spéciales dans votre compte ou sur notre page promotions.");

        $this->addToCollection($collection, "Quelle est le meilleur jeu ?", "Worms");
        $this->addToCollection($collection, "Quelle est le meilleur prof ?", "Colin");
        $this->addToCollection($collection, "here", "Faut pas faire ça ! 'Mme Emmanuelle Graziano' https://fautpasfaireca.fr");
    }

    public function addToCollection(CollectionResource $collection, string $question, string $answer) {
        $embeddings = Ollama::model('snowflake-arctic-embed2')->embeddings($question);
        $collection->add(
            ids: [Str::random()],
            documents: ['Q: ' . $question . '\nA: ' . $answer],
            metadatas: [["question" => $question, "answer" => $answer]],
            embeddings: [$embeddings['embedding']]
        );

        $embeddings = Ollama::model('snowflake-arctic-embed2')->embeddings($answer);
        $collection->add(
            ids: [Str::random()],
            documents: ['Q: ' . $question . '\nA: ' . $answer],
            metadatas: [["question" => $question, "answer" => $answer]],
            embeddings: [$embeddings['embedding']]
        );
    }
}
