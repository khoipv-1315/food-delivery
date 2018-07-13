<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index()
    {
        if (!Auth::check()) {
            session()->flash('message', 'You need to login');

            return back();
        }
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('layouts.order', compact(['orders']));
    }

    public function remove($id)
    {
        try {
            if ($orders = Order::find($id)) {
                $orders->delete();

                return back();
            } else {
                session()->flash('error', trans('admin_user.not id'));

                return back();
            }
        } catch (\Exception $e) {
            session()->flash('error', trans('admin_user.add_fail'));
            return back();
        }
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('layouts.order_detail', compact(['order']));
    }
}
