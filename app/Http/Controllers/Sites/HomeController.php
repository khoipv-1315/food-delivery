<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class HomeController extends Controller
{
    
    public function index()
    {
        $top_foods = Food::top(config('customer.product.index_qty'))->get();

        return view('layouts.index', compact(['top_foods']));
    }

    public function viewContact()
    {
        return view('layouts.contact');
    }

    public function view404()
    {
        return view('layouts.404');
    }

    public function viewTopFood()
    {
        $foods = Food::top(config('customer.product.limit_qty'));
        $paginate = $foods->pagination(config('customer.top_food.paginate'));
        $count = $foods->count();

        return view('layouts.top_food', compact(['paginate',
            'count',
        ]));
    }

    public function searchFood(Request $request)
    {
        if (!$request->ajax()) {
            return view('layouts.404');
        }
        $keyword = doubleval($request->keyword);
        if ($keyword == 0) {
            $foods = Food::searchByName($request->keyword)->get();            
        }
        else {
            $foods = Food::searchByPrice($keyword)->get();
        }

        return view('layouts.search', compact('foods'))->render();
    }

    public function viewDiscountFood()
    {
        $foods = Food::where('discount_id', '<>', config('customer.product.no_discount'));
        $paginate = $foods->pagination(config('customer.top_food.paginate'));
        $count = $foods->count();

        return view('layouts.top_food', compact(['paginate',
            'count',
        ]));
    }
}
