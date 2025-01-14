<?php

namespace App\Http\Controllers;

use App\Helpers\BotConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\InlineConversation;
use Codewithkyrian\ChromaDB\Facades\ChromaDB;
use Illuminate\Routing\Controller;
use Cloudstudio\Ollama\Facades\Ollama;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BotmanController extends Controller
{
    public function handle(Request $request)
    {
        $user_id = $request->input('userId');
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
        $botman = app('botman');

        $botman->hears('{message}', function(BotMan $botman, string $message) use ($user_id) {
            $questionEmbeddings = Ollama::model('snowflake-arctic-embed2')->embeddings($message);

            $collection = ChromaDB::getCollection("chatbot");
            $query = $collection->query(
                queryEmbeddings: [$questionEmbeddings['embedding']],
                nResults: 5,
                include: ['documents', 'distances', 'metadatas']
            );

            if($query->metadatas[0][0]['question'] == 'Quelle est le meilleur jeu ?' && $query->distances[0][0] < 150) {
                $botman->reply('Worms.');
                return;
            } else if($message == 'here') {
                $botman->reply('Faut pas faire ça ! \'Mme Emmanuelle Graziano\' https://fautpasfaireca.fr');
                return;
            } else if($query->metadatas[0][0]['question'] == 'Quelle est le meilleur prof ?' && $query->distances[0][0] < 150) {
                $botman->reply('Colin.');
                return;
            }


            if(config("chatbot.use_llm")) {
                $messages = [];

                foreach($query->metadatas as $meta) {
                    array_push($messages, ['role' => 'user', 'content' => $meta[0]['question']]);
                    array_push($messages, ['role' => 'assistant', 'content' => $meta[0]['answer']]);
                }

                array_push($messages, ['role' => 'sytem', 'content' => "***DEBUT DE NOUVELLE CONVERSATION***"]);
                array_push($messages, ['role' => 'system', 'content' => "En tant que modèle linguistique, votre tâche consiste à répondre à toutes les questions posées de manière concise, courte et sincère. Veillez à fournir des réponses diversifiées et informatives afin de maintenir l'intérêt de la conversation. IL FAUT ABSOLUMENT EVITER DE DONNER DES REPONSE SANS PREUVE NOTER CI-DESSUS. Évitez de rester bloqué dans des boucles ou de répéter la même réponse à plusieurs reprises. Vous êtes un assistant pour la société Vinotrip qui vend des séjours oenologique dans toute le france."]);

                $cache = Cache::get("chatbothistory_" . $user_id, []);
                $cache[] = ['role' => 'user', 'content' => $message];
                $messages = array_merge($messages, $cache);

                $llm = Ollama::agent("")->model('mistral')->options(['temperature' => 0.3])->stream(false)->chat($messages);
                $botman->reply($llm['message']['content']);
                $cache[] =  $llm['message'];

                Cache::put('chatbothistory_' . $user_id, $cache, 600); // 10 minutes
            } else {
                if(count($query->distances) == 0 || $query->distances[0][0] > 170) {
                    $botman->reply("Désoler, je n'ai pas compris votre question.");
                } else {
                    $botman->reply($query->metadatas[0][0]["answer"]);
                }
            }
        });

        $botman->listen();
    }
}
