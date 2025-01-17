<?php

namespace App\Http\Controllers;

use App\Models\ParticipantCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Travel;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
use App\Models\TravelHasResource;
use App\Models\Ressource;
use View;
use Carbon\Carbon;

class TravelController extends Controller
{

    public function show(Request $request)
    {
        $page = $request->input("page", 1);
        $total_pages = 0;

        $validated = $request->validate([
            'vineyard_category' => ['nullable','int','exists:vineyard_categories,id'],
            'duree' => ['nullable','numeric', 'max:5'],
            'participant_category' => ['nullable','int','exists:participant_categories,id'],
            'travel_category' => ['nullable','int','exists:travel_categories,id'],
        ]);

        $vineyardCatID = "";
        $ParticiantId = "";
        $TravelCategoryId = "";
        $Duree = "";

        $travels = [];
        $query = Travel::query()->where('state_travel', '=', 'Valide');
        if (
            isset($validated['vineyard_category']) ||
            isset($validated['duree']) ||
            isset($validated['participant_category']) ||
            isset($validated['travel_category'])
            ) {


            if( isset($validated['vineyard_category']) )
            {
                $vineyardCatID = $validated['vineyard_category'];
                $query->where('vineyard_category_id', '=', $validated['vineyard_category']);
            }
            if( isset($validated['duree']) )
            {
                $query->where('days', '=', $validated['duree']);
                $Duree = $validated['duree'];
            }
            if( isset($validated['participant_category']) )
            {
                $ParticiantId = $validated['participant_category'];
                $query->where('participant_category_id', '=', $validated['participant_category']);
            }
            if( isset($validated['travel_category']) )
            {
                $TravelCategoryId = $validated['travel_category'];
                $query->where('travel_category_id', '=', $validated['travel_category']);
            }


            // Appliquer la moyenne sur les reviews avant d'effectuer la récupération des données
            $query->withAvg('reviews', 'rating');

            // Limiter à 20 résultats par page avant de paginer
            $travels = $query->limit(20)->offset(($page - 1) * 20)->get();

            // Calculer le nombre total de pages après avoir récupéré les résultats
            $total_travels = $query->count(); // Nombre total de séjours pour calculer les pages
            $total_pages = ceil($total_travels / 20); // Arrondir à l'entier supérieur


        } else {
            $total_pages = Travel::query()->limit(20)->count() / 20;
            $travels = Travel::query()->limit(20)->offset(($page - 1) * 20);
            $travels->withAvg('reviews', 'rating');
            $travels = $travels->get(['travel.*', 'rating']);
        }

        return view('travels.travels', [
            'vineyard_category' => $vineyardCatID,
            'participant_category' => $ParticiantId,
            'travel_category' => $TravelCategoryId,
            'duree' => $Duree,

            "vineyard_categories" => VineyardCategory::all(),
            "travel_categories" => TravelCategory::all(),
            "participant_categories" => ParticipantCategory::all(),

            'sejours' => $travels,
            'current_page' => $page,
            'total_pages' => $total_pages
        ]);
    }
    
    public function show_single($id, Request $request)
    {
        $travel = Travel::find($id);
        $dateString = Carbon::now()->addMonths(18)->format('d-m-Y');

        return view('travels.travel',['date'=>$dateString,'travel' => $travel]);
    }
}
