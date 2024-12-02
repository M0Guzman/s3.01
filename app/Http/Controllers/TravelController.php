<?php

namespace App\Http\Controllers;

use App\Models\ParticipantCategory;
use Illuminate\Http\Request;
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
        $travels = [];
        if (
            $request->has('vignoble') &&   $request->input('vignoble') != ''||
            $request->has('duree') &&  $request->input('duree') != '' ||
            $request->has('pour-qui') &&   $request->input('pour-qui') != '' ||
            $request->has('envie') && $request->input('envie') != '') {
            $wheres = [];

            if($request->has('vignoble') && $request->input('vignoble') != '')
            {
                $cavignoble = VineyardCategory::where('name', '=', $request->input('vignoble'))->first();

                array_push($wheres, ['vineyard_category_id', '=', $cavignoble->id]);
            }
            if($request->has('duree') && $request->input('duree') != '')
            {

                array_push($wheres, ['days', '=', $request->input('duree')]);

            }
            if($request->has('pour-qui') && $request->input('pour-qui') != '')
            {
                $caParticipant = ParticipantCategory::where('name','=',$request->input('pour-qui'))->first();

                array_push($wheres, ['participant_category_id', '=', $caParticipant->id]);

            }
            if($request->has('envie') && $request->input('envie') != '')
            {
                $caTravel = TravelCategory::where('name','=',$request->input('envie'))->first();

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
            //$travels->leftJoin('reviews', 'reviews.travel_id', '=', 'travel.id')->avg('rating');
            $travels->withAvg('reviews', 'rating');
            $travels = $travels->get();

            }



        } else {
            $travels = Travel::take(1000);
            //$travels->leftJoin('reviews', 'reviews.travel_id', '=', 'travel.id')->avg('rating');
            $travels->withAvg('reviews', 'rating');

            $travels = $travels->get(['travel.*', 'rating']);
        }

        View::share("vinecats", VineyardCategory::all());
        return view('travels', [
            'vignoble'=>$request->input('vignoble'),
            'duree'=>$request->input('duree'),
            'pour_qui'=>$request->input('pour-qui'),
            'envie'=>$request->input('envie'),
            'sejours' => $travels
        ]);
    }
    public function afficher($id)
    {
        $travel = Travel::where('id', $id)->first();
        //$travel->leftJoin('reviews', 'reviews.travel_id', '=', 'travel.id');


        $dateString = Carbon::now()->addMonths(18)->format('d-m-Y');
        return view('travel',['date'=>$dateString,'travel' => $travel]);

    }
}
