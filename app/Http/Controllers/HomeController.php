<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Vineyard_category;
use App\Models\Travel;

class HomeController extends Controller
{
    public function index() {
        //$reviews = Review::all();
        $vin = 
        $vineyard_categorys = Vineyard_category::all('name');
        //$travels = Travel::all();
        return view("homepage", ["vinecats"=> $vineyard_categorys]);
    }
}
