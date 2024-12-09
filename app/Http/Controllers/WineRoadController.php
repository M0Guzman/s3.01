<?php

namespace App\Http\Controllers;

use App\Models\WineRoad;
use Illuminate\Http\Request;

class WineRoadController extends Controller
{
    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = WineRoad::query();


        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        $wine_roads = $query->get();
        return view('wine_roads', [
            'name' => $request->input('name'),
            'wine_roads' => $wine_roads,
        ]);
    }

    public function show(Request $request , $id)
    {
        $wineroad = WineRoad::find($id);

        return view('wine_road', [
            'wineroad' => $wineroad
        ]);

    }



}
