<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmed;
use App\Models\Order;
use App\Models\FoodOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::paginate(config('setup.user_paginate'));
        if ($request->ajax()) {            
            return view('admin.order.paginate', compact('orders'))->render();
        }
        
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        if ($orders = Order::find($id)) {
            $input = $request->only('status');
            if ($orders->update($input)) {
                if($request->status == 1) {
                    Mail::to($orders->user)->send(new OrderConfirmed($orders));
                }
                return redirect()->route('admin.order.index', [$id])->with('message', trans('admin_order.update success'));     
            } else {
                return redirect()->route('admin.order.index', [$id])->with('message', trans('admin_order.update failed'));
            }
        } else {
            session()->flash('fail', trans('admin_order.not id'));

            return redirect('admin.order.index');
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
        
        try {
            if ($orders = Order::find($id)) {
                $orders->foodOrders()->delete();
                $orders->delete();
                session()->flash('success', trans('admin_user.delete success'));

                return redirect('admin/order');
            } else {
                session()->flash('fail', trans('admin_user.not id'));

                return redirect('admin/order');
            }
        } catch (\Exception $e) {
            session()->flash('fail', trans('admin_user.add_fail'));
            return redirect('admin/order');
        }
    }

    public function orderDetail($id)
    {
        if ($orders = Order::find($id)) {
            return view('admin.order.detail', compact('orders'));
        } else {
            session()->flash('fail', trans('admin_discount.not id'));

            return redirect('admin.order.index');
        }
    }
}
