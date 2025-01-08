<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\Activity;
use App\Models\Partner;
use App\Models\TravelStep;
use App\Models\VineyardCategory;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use Illuminate\Http\Request;
use App\Models\Travel;
use Illuminate\Routing\Controller;

class DirigeantController extends Controller
{
    public function createTravel(Request $request)
    {
        $travel = Travel::get();



        return view("dashboard.Dirigeant.createTravel", [
            "travel" => $travel,
            "participant_categories" => ParticipantCategory::all(),
            "vineyardCategory" => VineyardCategory::all(),
            "travelCategory" => TravelCategory::all()
        ]);
    }

    public function EnrengistrerTravel(Request $request){
       
        
        $travel_id = Travel::get()->max("id")+1;
        
        $travel = Travel::create
        (
            [
                "id" => $travel_id,
                "wine_road_id" => 1,
                "description" => "null",
                "price_per_person" => $request->input("prix"),
                "title" => $request->input('nom_sejour'), //title
                "vineyard_category_id" => ($request->input("vignoble"))[0], //vignoble
                "participant_category_id" =>  ($request->input("pour_qui"))[0], //pour qui
                "travel_category_id" => $request->input("envie")[0],
                "days" => $request->input('pour_durée')[0], //duree
                "state_travel" => 'Cree'
            ]);
            return redirect()->route('dashboard.dirigeant.create.Travel',["travel" => $travel])->with('success', 'Le sejour est en cour de traitement.');
       
    }

    public function validateTravel(Request $request)
    {
        $travel = Travel::get();
        $activty = Activity::all();
        $partner = Partner::all();
        //$vineyardCategory = $travel->vineyard_category_id;
        

        return view("dashboard.Dirigeant.validateTravel", [
            "travels" => $travel,
            "activity" => $activty,
            "partner" => $partner,
            "travel_step" => TravelStep::all(),
            "participant_categories" => ParticipantCategory::all(),
            "vineyardCategory" => VineyardCategory:: all(),
            "travelCategory" => TravelCategory::all()
        ]);
    }

    public function actualiserTravel(Request $request)
    {
        $travels = Travel::where("state_travel","=","aValidee")->get();

        $valider =  $request->input("valider");
        $refuser = $request->input("refuser");

        if($valider == "true"){

        }
        elseif($refuser =="false"){
            $travels = Travel::where('id','=', $travels->id);
        }

        return redirect()->route('dashboard.dirigeant.create.Travel',["travels" => $travels])->with('success', 'Le sejour est valide ou non par le dirigeant.');
    }
 
}