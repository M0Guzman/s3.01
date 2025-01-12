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
        $this->addToCollection($collection, 'Bonjour', 'Bonjour et bienvenue sur vinotrip, la ou les voyages vont vous faire vomire vos tripes!');
        $this->addToCollection($collection, "Qu'est-ce que l'oenotourisme?", "L'oenotourisme est un type de tourisme qui consiste à visiter des vignobles, des caves et des régions viticoles pour découvrir les vins et les cultures locales.");
        $this->addToCollection($collection, "Qu'est-ce que vous proposez sur votre site?", "Nous proposons des séjours oenotouristiques personnalisés dans différentes régions viticoles du monde.");
        $this->addToCollection($collection, 'Comment réserver un séjour?', 'Etape 1: Faire un virement paypal de 999999€ a redboxing@redboxing.moe\nL etape 2 sera révéller une fois la premiere étape compléter.');
        $this->addToCollection($collection, "Quels sont les modes de paiement acceptés?", "Nous acceptons les cartes de crédit ainsie que les paiment via Paypal");
        $this->addToCollection($collection, "Est-ce que je peux annuler ou modifier ma réservation?", "Oui, vous pouvez annuler ou modifier votre réservation jusqu'à 30 jours avant la date de départ, sous certaines conditions.");
        $this->addToCollection($collection, "Est-ce que les séjours sont adaptés aux enfants?", "Oui, nous proposons des séjours adaptés aux enfants, avec des activités spécifiques pour les enfants.");
        $this->addToCollection($collection, "Quels sont les tarifs des séjours?", "Les tarifs des séjours varient en fonction de la durée, de la destination et des activités.");
        $this->addToCollection($collection, "Est-ce que vous proposez des promotions ou des réductions?", "Oui, nous proposons des promotions et des réductions régulièrement, notamment pour les réservations anticipées.");
        $this->addToCollection($collection, "Est-ce que vous proposez des séjours pour les personnes à mobilité réduite?", "Oui, nous proposons des séjours adaptés pour les personnes à mobilité réduite.");
        $this->addToCollection($collection, "Est-ce que vous proposez des séjours pour les couples?", "Oui, nous proposons des séjours pour les couples.");



        $this->addToCollection($collection, "Quelle est le meilleur jeu?", "Worms");
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
