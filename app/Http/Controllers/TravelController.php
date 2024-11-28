<?php
 
namespace App\Http\Controllers;
 
use App\Models\ParticipantCategory;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
 
class TravelController extends Controller
{
 
    public function show(Request $request)
    {
        
        //dd($request);
        
        $avis = Review::where('travel_id','=',Travel::all('id'));
        $moyenneAvis = $avis->avg(Review::all('rating')->where($avis,'=',Review::where('travel_id','=',$avis)));
        array_push($moyenneAvis, ['travel_id', '=', $avis->id]);
        

        $sejours = array();
        //dd($request);
        if ($request->has('vignoble') || $request->has('duree') || $request->has('pour-qui') || $request->has('envie')) {
            $wheres = [];


            
            
            if($request->has('vignoble') && $request->input('vignoble') != '')
            {
                $cavignoble = VineyardCategory::where('name', '=', $request->input('vignoble'))->first();
                //$travels = $travels->where('vineyard_category_id', '=', $cavignoble->id);
                array_push($wheres, ['vineyard_category_id', '=', $cavignoble->id]);
            }
            if($request->has('duree') && $request->input('duree') != null)
            {   
                //$travels = $travels->where('days','=', $request->input('duree'));
                array_push($wheres, ['days', '=', $request->input('duree')]);

            }
            if($request->has('pour-qui') && $request->input('pour-qui') != null)
            {           
                $caParticipant = ParticipantCategory::where('name','=',$request->input('pour-qui'))->first();
                //$travels = $travels->where('participant_category_id','=',$caParticipant->id);
                array_push($wheres, ['participant_category_id', '=', $caParticipant->id]);

            }
            if($request->has('envie') && $request->input('envie') != null)
            {           
                $caTravel = TravelCategory::where('name','=',$request->input('envie'))->first();
                //$travels = $travels->where('travel_category','=',$caTravel->id);
                array_push($wheres, ['travel_category_id', '=', $caTravel->id]); //erreur array_push() does not accept unknown named parameters
            }
    
            $travels = null;

            foreach($wheres as $where) {
                if($travels == null) {
                    $travels = Travel::where($where[0], $where[1], $where[2]);
                } else {
                    $travels = $travels->where($where[0], $where[1], $where[2]);
                }
            }

            $travels = $travels->get();
            

            //->take(10)
            //->get();
            
            
                

        } else {
            $travels = Travel::all();
        }
 
            return view('travels', ['sejours' => $travels]);
    }
 
}