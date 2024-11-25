<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SejourController extends Controller
{
    public function rechercherSejours(Request $request)
    {
        $idcatvignoble = $request->input('idcatvignoble');
        $nbjours = $request->input('nbjours');
        $idcatparticipant = $request->input('idcatparticipant');
        $idtheme = $request->input('idtheme');
 
        $sejours = DB::table('SEJOUR')
            ->when($idcatvignoble, function ($query, $idcatvignoble) {
                return $query->where('IDCATVIGNOBLE', $idcatvignoble);
            })
            ->when($nbjours, function ($query, $nbjours) {
                return $query->where('NBJOURS', $nbjours);
            })
            ->when($idcatparticipant, function ($query, $idcatparticipant) {
                return $query->where('IDCATPARTICIPANT', $idcatparticipant);
            })
            ->when($idtheme, function ($query, $idtheme) {
                return $query->where('IDTHEME', $idtheme);
            })
            ->get();
 
        return response()->json($sejours);
    }
}
