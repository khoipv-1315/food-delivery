<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Review;

class FoodController extends Controller
{
    public function index($id)
    {   
        $food = Food::find($id);
        $reviews = Review::where('food_id', $id)->get();

        return view('layouts.food_detail', compact('food', 'reviews'));
    }
}
