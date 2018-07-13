<?php

namespace App\Http\Controllers\Admins;

use App\Models\DiscountFood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountForm;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $discounts = DiscountFood::paginate(10);
        if ($request->ajax()) {            
            return view('admin.discount.paginate', compact('discounts'))->render();
        }
        return view('admin.discount.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discounts = DiscountFood::all();
        return view('admin.discount.add', compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountForm $request)
    {
        $discounts = new DiscountFood;
        $input = $request->all();
        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));
        if ($discounts->create($input)) {
            return redirect()->route('admin.discount.index')->with('message', trans('admin_discount.create success'));
        } else {
            return redirect()->route('admin.discount.create')->with('message', trans('admin_discount.create failed'));
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
        if ($discounts = DiscountFood::find($id)) {
            return view('admin.discount.edit', compact('discounts'));
        } else {
            session()->flash('fail', trans('admin_discount.not id'));
            return redirect('admin/discount');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountForm $request, $id)
    {
        $discounts = new DiscountFood;
        if ($discounts = $discounts->find($id)) {
            $input = $request->all();
            $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
            $input['end_date'] = date('Y-m-d', strtotime($input['end_date']));
            if ($discounts->update($input)) {
                session()->flash('success', trans('admin_discount.update success'));
                return redirect()->route('admin.discount.index');
            } else {
                session()->flash('fail', trans('admin_discount.update failed'));
                return redirect()->route('admin.discount.update');
            }
        } else {
            session()->flash('fail', trans('admin_discount.not id'));
            return redirect('admin.user.index');
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
        if ($discounts = DiscountFood::find($id)) {
            $discounts->delete($id);
            session()->flash('success', trans('admin_discount.delete success'));

            return redirect('admin/discount');
        } else {
            session()->flash('fail', trans('admin_discount.not id'));
            return redirect('admin/discount');
        }
    }

    public function date($name, $value = '', $options = [], $format = 'Y-m-d')
    {
        if ($value instanceof Date) {
            $value = $value->format($format);
        }
        return $this->input('date', $name, $value, $options);
    }
}
