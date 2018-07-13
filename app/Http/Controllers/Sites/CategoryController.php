<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;

class CategoryController extends Controller
{	
    public function index() 
    {	
    	$foods = Food::all();
    	$paginate = Food::pagination(config('customer.category.paginate'));
        $count = $foods->count();
        $top_foods = Food::top(config('customer.product.limit_qty'))->get();

     	return view('layouts.category', compact(['count',
            'foods',
            'top_foods',
            'paginate',
        ]));
    }

    public function show(Request $request, $id)
    {
    	$foods = Food::where('category_id', $id);
    	$paginate = $foods->pagination(config('customer.category.paginate'));
        $count = $foods->count();
        $top_foods = $foods->top(config('customer.product.limit_qty'))->get();

    	return view('layouts.category', compact(['count',
            'foods',
            'top_foods',
            'paginate',
        ]));
    }
}
