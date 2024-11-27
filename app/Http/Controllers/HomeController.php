<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index() {
        //$reviews = Review::take(10)->all();
        return view("homepage");
    }
}
