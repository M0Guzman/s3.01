<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Department;
use App\Models\UserAddress;
use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function edit(Request $request) {
    
        $request->merge([
            'address_id' => (int) $request->address_id,
        ]);

        $validated = $request->validate([
            'address_id' => ['required','int',"exists:addresses,id"],
            'addressname' => ['required', 'string', 'max:255'],
            'rue' => ['required','string','max:255'],
            'telephone' => ['required','string', 'max:10'],
            'ville' => ['required','string','max:255'],
            'cp' => ['required','string','max:5'],
            'department' => ['required','string','max:100']
        ]);
        
        $user_id = $request->user()->id;

        $useraddress = UserAddress::whereIn('user_id', [$user_id])
            ->where('address_id', $validated["address_id"])
            ->first();
        
        $oneAddress = $useraddress->address;
        if (!$useraddress) {return "ERROR";} // A modifier proprement

        $oneAddress = $useraddress->address; // Vous pouvez maintenant accéder à la relation


        $oneAddress->update([
            'name' => $validated['addressname'],
            'street' => $validated['rue'],
            'phone' => $validated['telephone']
        ]);

        if ($validated['ville'] != $oneAddress->city->name) {
            $city=City::where('name','=',$validated['ville'])->first();
            if($city == null) {
                $department=Department::find($validated['cp']);
                if($department == null) {
                    $department = Department::create([
                        'zip' => $validated['cp'],
                        'name' => $validated['department']
                    ]);
                }

                $city = City::create([
                    'name' => $validated['ville'],
                    'department_zip' => $department->zip,
                ]);
            
            $oneAddress->update([
                'city_id' => $city->id,
                'department_id' => $department->id
            ]);
            }
        }

        
        return back()->with('status', 'Address-updated');

    }




    public function create(Request $request) {
        
        
        $validated = $request->validate([
            //Rajouter nom address dans la bd
            'addressname' => ['required', 'string', 'max:255'],
            'rue' => ['required','string','max:255'],
            'ville' => ['required','string','max:255'],
            'cp' => ['required','string','max:5'],
            'department' => ['required','string','max:100'],
            'telephone' => ['required','string', 'max:10']
        ]);
        

        $user_id = $request->user()->id;
        
        $city=City::where('name','=',$validated['ville'])->first();
        if($city == null) {
            $city = City::create([
                'name' => $validated['ville'],
                'department_zip' => $validated['department'],
            ]);
        }

        $address = Address::create([
            'name' => $validated['addressname'],
            'phone' => $validated['telephone'],
            'street' => $validated['rue'],
            'city_id' => $city->id,
        ]);
                

        $UserAddress = UserAddress::create([
            'user_id' => $user_id,
            'address_id' => $address->id
        ]);

        return back()->with('status', 'Address-created');
    }

    public function destroy(Request $request) {
        
        $user_id = $request->user()->id;        

        $this_address_id = $request->address_id;



        UserAddress::where('user_id', $user_id)->where('address_id', $this_address_id)->delete();

        $UserAddress=UserAddress::where('address_id','=',$this_address_id)->first();
        if ($UserAddress == null) {
            Address::where('id', $this_address_id)->delete();
        }

        return back()->with('status', 'Address-deleted');
    }
}
