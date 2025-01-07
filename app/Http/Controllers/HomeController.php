<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Routing\Controller;
use View;

class HomeController extends Controller
{
    public function index() {

        $travels_avis = Travel::query();
        $travels_avis->join('reviews', 'reviews.travel_id', '=', 'travel.id');
        $travels_avis->join('users', 'users.id', '=', 'reviews.user_id');
        $travels_avis->withCount('reviews');
        $travels_avis->withAvg('reviews', 'rating');
        $travels_avis->orderBy('reviews_avg_rating', 'desc')->limit(10);
        $travels_avis->addSelect([
            'reviews.title as review_title',
            'reviews.description as review_desc',
            'users.last_name as user_last_name',
            'users.first_name as user_first_name'
        ]);

        $travels_avis = $travels_avis->get();

        View::share("travels_avis", $travels_avis);
        return view('homepage');
    }
}
