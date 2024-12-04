<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Travel;
use App\Models\TravelStep;
use App\Models\Activity;
use App\Models\Partner;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Session;
use View;

class ModifeControlleur extends Controller
{
    public function show(Request $request) 
    {
        if(!$request->has('id'))
            return redirect(RouteServiceProvider::HOME);

        
            $travel = Travel::find($request->input('id'));

            

        return view("modife", ['travel' =>$travel]);

    }

}