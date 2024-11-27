<?php

namespace App\Http\Controllers\User;

use App\Models\UserAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function update(Request $request) {
        
        $validated = $request->validate([
            'address_id' => ['required','int'],
            'ville' => ['required','string','max:255'],
            'cp' => ['required','string','max:5'],
            'department' =>['required','string','max:100'],
            'telephone' => ['required','string', 'max:10']
        ]);

        $user_id = $request->user()->id;

        $useraddress = UserAddress::find([
            $user_id,
            $validated['address_id']
        ]);

        $address = $useraddress->address;

        $address->update([
            'zip' => $validated['cp'],
            'phone' => $validated['telephone']
        ]);

        if ($validated['ville'] != $address->ville->name) {
            $city=City::where('name','=',$validated['ville'])->first();
            if($city == null) {
                $departement=Departement::find($validated['cp']);
                if($departement == null) {
                    $departement= Departement::create([
                        'id' => $validated['id'],
                        'name'=> $validated['departement']
                    ]);
                }

                $city= City::create([
                    'name' => $validated['ville'],
                    'department_id' => $departement->id
                ]);
            }
                
            $address->update(['city_id' => $city->id]);
        }

        return back()->with('status', 'Address-updated');

    }
}
