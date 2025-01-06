<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ActivityType;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\WineCellar;
use App\Models\OtherPartner;
use App\Models\Department;
use App\Models\City;
use App\Models\CookingType;
use App\Models\Address;

class ServiceVenteController extends Controller
{
    public function afficherPagePartenaire(Request $request){
        $departments = Department::all();
        $typePartenaires = ActivityType::all();
        $cookingTypes = CookingType::all();

        return view('dashboard.service_vente.addhotel', [
            'departments' => $departments,
            'typePartenaires' => $typePartenaires,
            'cookingTypes' => $cookingTypes
        ]);
    }

    public function afficherPageSejour(Request $request){

        $domains = WineCellar::all();
        $hebergements = Hotel::all();
        
        return view('dashboard.service_vente.sejour', [
            'domains' => $domains,
            'hebergements' => $hebergements,
        ]);
    }

    public function createPartenaire(Request $request) {


        $validated = $request->validate([
            'typePartenaire' => ['required', 'exists:activity_types,id'],
            'name' => ['required', 'string', 'max:100'],
            'prix_adulte' => ['required','int'],
            'prix_enfant' => ['required','int'],
            'horaire' => ['required','string','max:15'],
            'telephone' => ['required','string','max:10'],
            'email' => ['required','string','max:100'],
            'rue' => ['required','string','max:100'],
            'ville' => ['required','string','max:100'],
            'cp' => ['required','string','max:5'],
            'department'=> ['required'],

            'categorie' => ['nullable','string', 'max:100'],
            'nombre_chambre' => ['nullable','int'],

            'specialite' => ['nullable','string', 'max:100'],
            'cookingType' => ['nullable','exists:cooking_types,id'],
            'nombre_etoile' => ['nullable','int'],

            'description' => ['required','string']
        ]);

        
        

        $city=City::where('name','=',$validated['ville'])->where('zip', '=', $validated['cp'])->first();
        if($city == null) {
            $city = City::create([
                'name' => $validated['ville'],
                'zip' => $validated['cp'],
                'department_id' => $validated['department'],
            ]);
        }

        $addressPartner = Address::create([
            'name' => $validated['name'], // $validated["name"] correspond au nom du partenaire
            'phone' => $validated['telephone'],
            'street' => $validated['rue'],
            'city_id' => $city->id,
        ]);

        $nouveauPartner = Partner::create([
            'activity_type_id' => $validated["typePartenaire"],
            'address_id' => $addressPartner->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'description' => $validated['description'],
            'phone' => $validated['telephone']
        ]);


        
        $typePartenaire = $validated['typePartenaire'];
        switch ($typePartenaire) {

            case 1:
                $cave = WineCellar::create([
                    'partner_id' => $nouveauPartner ->id,
                    'sampling_type_id' => 1
                ]);
                break;

            case 2:
                $restaurant = Restaurant::create([
                    'partner_id' => $nouveauPartner ->id,
                    'cooking_type_id' => $validated['cookingType'],
                    'ranking'=> $validated['nombre_etoile'],
                    'speciality' => $validated['specialite'],
                ]);
                break;
    

            case 3:

                $hotel = Hotel::create([
                    'partner_id' => $nouveauPartner ->id,
                    'description'=> $validated['categorie'],
                    'room_count' => $validated['nombre_chambre'],
                ]);
                break;
                          
            
            case 4:
                $other = OtherPartner::create([
                    'partner_id' => $nouveauPartner ->id,
                    'other_partner_activity_type_id' => 1
                ]);
                break;
        }
        

        return back()->with('success', 'oui');
    }

    
}
