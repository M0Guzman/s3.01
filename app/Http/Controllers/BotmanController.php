<?php

namespace App\Http\Controllers;

use Codewithkyrian\ChromaDB\Facades\ChromaDB;
use Illuminate\Routing\Controller;
use Cloudstudio\Ollama\Facades\Ollama;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BotmanController extends Controller
{
    public function handle()
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            $questionEmbeddings = Ollama::model('snowflake-arctic-embed2')->embeddings($message);

            $collection = ChromaDB::getCollection("chatbot");
            $query = $collection->query(
                queryEmbeddings: [$questionEmbeddings['embedding']],
                nResults: 1,
                include: ['documents', 'distances', 'metadatas']
            );

            Log::debug(json_encode($query));

            if(count($query->distances) == 0 || $query->distances[0][0] > 170) {
                $botman->reply("Désoler, je n'ai pas compris votre question.");
            } else {
                $botman->reply($query->metadatas[0][0]["answer"]);
            }
        });

        $botman->listen();
    }
}
