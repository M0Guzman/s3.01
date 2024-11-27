<?php
 
namespace App\Http\Controllers;
 
use App\Models\ParticipantCategory;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
 
class TravelController extends Controller
{
 
    public function show(Request $request)
    {
        $sejours = array();
        //dd($request);
        if ($request->has('vignoble') || $request->has('duree') || $request->has('pour-qui') || $request->has('envie')) {
            
            $travels = Travel::all();
            
            //$caDays = Travel::where('name','=',$days)->first();
            //$caParticipant = ParticipantCategory::where('name','=',$idcatParticipant)->first();
            //$caTravel = TravelCategory::where('name','=',$idcatTravel)->first();
            
            if($request->has('vignoble') && $request->input('vignoble') != null)
            {
                $cavignoble = VineyardCategory::where('name', '=', $request->input('vignoble'))->first();
                $travels = $travels->where('vineyard_category_id', '=', $cavignoble->id);
            }
            if($request->has('duree') && $request->input('duree') != null)
            {           
                $caDays = Travel::where('name','=',$request->input('duree'))->first();
                $travels = $travels->where('days','=', $caDays->id);
                
            }
            if($request->has('pour-qui') && $request->input('pour-qui') != null)
            {           
                $caParticipant = Travel::where('name','=',$request->input('pour-qui'))->first();
                $travels = $travels->where('participant_category_id','=',$caParticipant->id);
            }
            if($request->has('envie') && $request->input('envie') != null)
            {           
                $caTravel = Travel::where('name','=',$request->input('envie'))->first();
                $travels = $travels->where('travel_category','=',$caTravel->id);
            }
    
            
            

            //->take(10)
            //->get();
            
            
                

        } else {
            $sejours = Travel::all();
        }

    
        //var_dump($sejours);
 
        
            //  ->when($idcatvignoble, function ($query, $idcatvignoble) {
            //      return $query->where('IDCATVIGNOBLE', $idcatvignoble);
                 
            //  })
            //  ->when($nbjours, function ($query, $nbjours) {
            //      return $query->where('NBJOURS', $nbjours);
            //  })
            //  ->when($idcatparticipant, function ($query, $idcatparticipant) {
            //      return $query->where('IDCATPARTICIPANT', $idcatparticipant);
            //  })
            //  ->when($idtheme, function ($query, $idtheme) {
            //      return $query->where('IDTHEME', $idtheme);
            //  })
            //  ->get();
 
            return view('travels', ['sejours' => $sejours]);
    }
 
 
}