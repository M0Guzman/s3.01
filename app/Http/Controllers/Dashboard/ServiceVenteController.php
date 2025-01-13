<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\BookingOrder;
use App\Models\Order;
use App\Models\TravelHasResource;
use App\Models\TravelStep;
use App\Models\VineyardCategory;
use DB;
use Illuminate\Routing\Controller;
use App\Models\ActivityType;
use App\Models\OrderState;
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
use App\Models\User;
use App\Models\Resource;
use Illuminate\Support\Facades\Storage;

class ServiceVenteController extends Controller
{

    public function afficherPageHotel(Request $request) {

        $hotels = Hotel::all();


        return view('dashboard.service_marketing.hotel', [
            'hotels' => $hotels,
        ]);

    }


    public function afficherPagePartenaire(Request $request){
        $departments = Department::all();
        $typePartenaires = ActivityType::all();
        $cookingTypes = CookingType::all();

        return view('dashboard.service_marketing.addpartenaire', [
            'user' => $request->user(),
            'departments' => $departments,
            'typePartenaires' => $typePartenaires,
            'cookingTypes' => $cookingTypes
        ]);
    }

    public function afficher(Request $request)
    {
        $users = User::get();

        return view('dashboard.service_vente', [
            'users' => $users
        ]);
    }

    public function afficherPageSejour(Request $request){

        $domains = WineCellar::all();
        $hebergements = Hotel::all();
        $Travels = Travel::where("state_travel",'=',"Cree")->get();

        return view('dashboard.service_marketing.sejour', [
            'domains' => $domains,
            'hebergements' => $hebergements,
            'Travels' => $Travels
        ]);
    }

    public function modifierSejour(Request $request){



        $validated = $request->validate([
            'idTravel' => ['required','int','exists:travel,id'],
            'description' => ['required','string'],
            'housings' => ['required','array'],
            'domains' => ['required','array'],
            'steps' => ['required', 'array']
        ]);



        $travelToModifie = Travel::where('id', $validated['idTravel'])->first();

        if($travelToModifie != null) {


            foreach($validated['steps'] as $oneStep) {
                TravelStep::create([
                    'travel_id' => $travelToModifie->id,
                    'title'=> $oneStep["title"],
                    'description'=> $oneStep["description"]
                ]);


                $image_parts = explode(";base64,", $oneStep['image']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $Image = Resource::create([
                    'filename' => substr($oneStep["title"], 0, 50),
                    'mimetype' => "image/" . $image_type,
                ]);
                Storage::put($Image->id, $image_base64);



                TravelHasResource::create([
                    'travel_id' => $travelToModifie->id,
                    'resource_id' => $Image->id
                ]);
            }

            $travelToModifie->description = $validated['description'];
            $travelToModifie->state_travel = 'avalide';
            $travelToModifie->department_id = 74;
            $travelToModifie->save();



            return back()->with('success', 'oui');
        }

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
            'city_id' => $city->id
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

    public function showHomepage(Request $request) {
        $sales_count = Order::query()->join('booking_orders', 'booking_orders.order_id', '=', 'orders.id')->whereRaw('orders.created_at >= current_timestamp - interval \'30 day\'')->count();
        $sales_per_states = Order::query()->join('booking_orders', 'booking_orders.order_id', '=', 'orders.id')->join('order_states', 'orders.order_state_id', '=', 'order_states.id')->whereRaw('orders.created_at >= current_timestamp - interval \'30 day\'')->groupBy(['order_states.id'])->selectRaw('order_states.name, count(booking_orders.*)')->get();

        $sales_per_vineyards = Order::query()->join('booking_orders', 'booking_orders.order_id', '=', 'orders.id')->join('bookings', 'bookings.id', '=', 'booking_orders.booking_id')->join('travel', 'travel.id', '=', 'bookings.travel_id')->join('vineyard_categories', 'travel.vineyard_category_id', '=', 'vineyard_categories.id')->whereRaw('orders.created_at >= current_timestamp - interval \'30 day\'')->groupBy(['vineyard_categories.id'])->selectRaw('vineyard_categories.name, count(booking_orders.*)')->get();

        $sales_per_departments = Order::query()->join('booking_orders', 'booking_orders.order_id', '=', 'orders.id')->join('addresses', 'orders.address_id', '=', 'addresses.id')->join('cities', 'addresses.city_id', 'cities.id')->join('departments', 'cities.department_id', 'departments.id')->whereRaw('orders.created_at >= current_timestamp - interval \'30 day\'')->groupBy(['departments.id'])->selectRaw('departments.name, count(booking_orders.*)')->get();

        $sales_per_cities = Order::query()->join('booking_orders', 'booking_orders.order_id', '=', 'orders.id')->join('addresses', 'orders.address_id', '=', 'addresses.id')->join('cities', 'addresses.city_id', 'cities.id')->whereRaw('orders.created_at >= current_timestamp - interval \'30 day\'')->groupBy(['cities.id'])->selectRaw('cities.*, count(booking_orders.*)')->get();
;

        return view('dashboard.service_marketing.home', [
            'sales_count' => $sales_count,
            'sales_per_states' => $sales_per_states,
            'sales_per_vineyards' => $sales_per_vineyards,
            'sales_per_departments' => $sales_per_departments,
            'sales_per_cities' => $sales_per_cities
        ]);
    }
}
