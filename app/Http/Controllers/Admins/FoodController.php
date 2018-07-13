<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Category;
use App\Models\DiscountFood;
use App\Helpers\helper;
use App\Http\Requests\FoodForm;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $foods = Food::paginate(5);
        if ($request->ajax()) {            
            return view('admin.food.paginate', compact('foods'))->render();
        }
        
        return view('admin.food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $discounts = DiscountFood::pluck('discount', 'id');

        return view('admin.food.add', compact('categories', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodForm $request)
    {
        $foods = new Food;
        $input = $request->all();
        if ($request->hasFile('image')) {
                $avatarName = helper::importFile($request->file('image'), config('setup.food_image'));
                $input['image'] = $avatarName;
            }
        if ($foods->create($input)) {
            return redirect()->route('admin.food.index')->with('message', trans('admin_food.create success'));
        } else {
            return redirect()->route('admin.food.create')->with('message', trans('admin_food.create failed'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Category::pluck('name', 'id');
            $discounts = DiscountFood::pluck('discount', 'id');
            $foods = Food::find($id);
        } catch (\Exception $e) {
            return redirect()->route('admin.food.index')->with('message', trans('messages.id_errors'));
        }
        
        return view('admin.food.edit', compact('categories', 'discounts', 'foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foods = new Food;
        if ($foods = $foods->find($id)) {
            $input = $request->all();
            if ($request->hasFile('image')) {
                $avatarName = helper::importFile($request->file('image'), config('setup.food_image'));
                $input['image'] = $avatarName;
            }
            if ($foods->update($input)) {
                return redirect()->route('admin.food.index', [$id])->with('message', trans('messages.update_success'));     
            } else {
                return redirect()->route('admin.food.edit', [$id])->with('message', trans('messages.update_failed'));
            }
        } else {
            session()->flash('fail', trans('admin_user.not id'));

            return redirect('admin.food.index');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($foods = Food::find($id)) {
            $foods->delete($id);
            session()->flash('success', trans('admin_food.delete success'));

            return redirect('admin/food');
        } else {
            session()->flash('fail', trans('admin_food.not id'));

            return redirect('admin/food');
        }
    }

    public function search(Request $request)
    {   
        try {
            $name = $request->name;
            $foods = Food::where('name', 'like', '%'. $name .'%')->get();
            $html = view('admin.food.search', compact('foods'))->render();

            return response($html);
        } catch (Exception $e) {
            $response['error'] = true;
            
            return response()->json($response);
        }
    }
}
