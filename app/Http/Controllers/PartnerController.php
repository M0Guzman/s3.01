<?php

namespace App\Http\Controllers;

use App\Models\ParticipantCategory;
use Illuminate\Http\Request;
use App\Models\Partner;
use View;
use Carbon\Carbon;


class PartnerController extends Controller
{
    public function show_single($id, Request $request)
    {
        $partner = Partner::find($id);
        
        return view('partner',['partner' => $partner]);
    }

    
}