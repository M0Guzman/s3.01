<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ActivityType;
use App\Models\VineyardCategory;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\WineCellar;
use App\Models\OtherPartner;
use App\Models\Department;
use App\Models\City;
use App\Models\Travel;
use App\Models\CookingType;
use App\Models\Address;

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
                "wine_road_id" => 55,
                "description" => "null",
                "price_per_person" => 0.00,
                "title" => $request->input('nom_sejour'), //title
                "vineyard_category_id" => ($request->input("vignoble"))[0], //vignoble
                "participant_category_id" =>  ($request->input("pour_qui"))[0], //pour qui
                "travel_category_id" => $request->input("envie")[0],
                "days" => $request->input('pour_durée')[0], //duree
                //"state_Travel" =>
            ]);
            return redirect()->route('dashboard.dirigeant.create.Travel',["travel" => $travel])->with('success', 'Le sejour est en cour de traitement.');
       
    }

    public function validateTravel(Request $request)
    {
        $travel = Travel::get();



        return view("dashboard.Dirigeant.validateTravel", [
            "travel" => $travel,
            "participant_categories" => ParticipantCategory::all(),
            "vineyardCategory" => VineyardCategory::all(),
            "travelCategory" => TravelCategory::all()
        ]);
    }

 
}