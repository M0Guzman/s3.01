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

        if ($request->has('idcatvignoble')) {
            $idcatvignoble = $request->input('idcatvignoble');
            $nbjours = $request->input('nbjours');
            $idcatparticipant = $request->input('idcatparticipant');
            $idtheme = $request->input('idtheme');
    
            $sejours = Travel::where([
                [VineyardCategory::class, '=', $idcatvignoble],
                [Travel::class,'=',$nbjours],
                [ParticipantCategory::class,'=', $idcatparticipant],
                [TravelCategory::class,'=', $idtheme]            
            ]);
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