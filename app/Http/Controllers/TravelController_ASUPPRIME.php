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

class TravelController_ASUPPRIME extends Controller
{

    public function show(Request $request)
    {
        $page = $request->input("page", 1);
        $total_pages = 0;

        $validated = $request->validate([
            'vineyard_category' => ['int','exists:vineyard_categories,id'],
            'duree' => [ 'numeric', 'max:5'],
            'participant_category' => ['int','exists:participant_categories,id'],
            'travel_category' => ['int','exists:travel_categories,id'],
        ]);

        var_dump($validated);

        $travels = [];
        if (
            $validated['vineyard_category'] != null ||
            $validated['duree'] != null ||
            $validated['participant_category'] != null ||
            $validated['travel_category'] != null
            ) {
            
            $wheres = [
                ['state_travel', '=', 'Valide']
            ];

            if($request->has('vineyard_category') && $request->input('vineyard_category') != '')
            {
                $cavignoble = VineyardCategory::where('name', '=', $request->input('vineyard_category'))->first();

                array_push($wheres, ['vineyard_category_id', '=', $cavignoble->id]);
            }
            if($request->has('duree') && $request->input('duree') != '')
            {

                array_push($wheres, ['days', '=', $request->input('duree')]);

            }
            if($request->has('participant_category') && $request->input('participant_category') != '')
            {
                $caParticipant = ParticipantCategory::where('name','=',$request->input('participant_category'))->first();

                array_push($wheres, ['participant_category_id', '=', $caParticipant->id]);

            }
            if($request->has('travel_category') && $request->input('travel_category') != '')
            {
                $caTravel = TravelCategory::where('name','=',$request->input('travel_category'))->first();

                array_push($wheres, ['travel_category_id', '=', $caTravel->id]);
            }

            foreach($wheres as $where) {
                if($travels == null) {
                    $travels = Travel::where($where[0], $where[1], $where[2]);
                } else {
                    $travels = $travels->where($where[0], $where[1], $where[2]);
                }
            }


            if($travels != null) {
                $travels->withAvg('reviews', 'rating');
                $travels = $travels->limit(20);

                $total_pages = $travels->count() / 20;
                $travels = $travels->offset(($page - 1) * 20)->get();
            }
        } else {
            $total_pages = Travel::query()->limit(20)->count() / 20;
            $travels = Travel::query()->limit(20)->offset(($page - 1) * 20);
            $travels->withAvg('reviews', 'rating');
            $travels = $travels->get(['travel.*', 'rating']);
        }

        return view('travels.travels', [
            'vineyard_category' => $request->input('vineyard_category'),
            'duree' => $request->input('duree'),
            'participant_category' => $request->input('pour-qui'),
            'travel_category'=> $request->input('travel_category'),
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
