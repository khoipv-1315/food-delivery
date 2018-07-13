<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;
use App\Models\FoodOrder;
use App\Http\Requests\OrderForm;
use Carbon\Carbon;
use Cart;

class CartController extends Controller
{
    public function index() 
    {
        $cart_items = Cart::content();
        $total = Cart::total();
        if(Auth::check()) {
            $user = Auth::user();

            return view('layouts.cart', compact(['cart_items', 'total', 'user']));
        }
        
        return view('layouts.cart', compact(['cart_items', 'total']));
    }

    public function addToCart(Request $request, $id) 
    {
        $food = Food::find($id);
        if (isset($request->quantity)) {
            $request->validate(['quantity' => 'required|min:1|numeric']);
            $quantity = $request->quantity;
        }
        else $quantity = config('customer.product.default_qty');
        if ($food->discount_id != config('customer.product.no_discount')
                && $food->discountFood->end_date >= Carbon::now()) {
            $food->price -= $food->price * $food->discountFood->discount / config('customer.percentage');
        }
        Cart::add($food->id, $food->name, $quantity, $food->price, ['image' => $food->image]);
        session()->flash('message', $food->name . ' has been added to cart');

        return back();
    }

    public function removeFromCart($id)
    {
        Cart::remove($id);

        return back();
    }

    public function updateCart(Request $request, $id)
    {
        $desc = $request->desc;
        $qty = $request->quantity;
        if (isset($desc)) {
            Cart::update($id, $qty-1);
        }
        else {
            Cart::update($id, $qty+1);
        }

        return back();
    }

    public function checkEmail(Request $request)
    {
        if (!$request->ajax()) {
            return view('layouts.404');
        }
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (!is_null($user)) {
            $result = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'address' => $user->address,
                'phone' => $user->phone,
            ];
        }
        else {
            $result = [
                'id' => 0,
                'name' => '',
                'email' => $email,
                'address' => '',
                'phone' => '',
            ];
        }

        return response()->json($result);
    }

    public function store(OrderForm $request)
    {   
        if(Cart::count() == 0) {
            session()->flash('message', 'Empty Cart');

            return back();
        }
        $user_id = $request->user_id;
        if ($user_id != 0) {
            $user = User::find($user_id);           
        }
        else {
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt('');
            $user->role = config('customer.user.default_role');
            $user->avatar = config('customer.user.default_avatar');
        }
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $check_user = $user->save();
        if(!$check_user) {
            session()->flash('error', trans('master.failtOrder'));
            
            return back();
        } 

        $order = new Order();
        $order->user_id = $user->id;
        $order->description = isset($request->description) ? $request->description : '';
        $order->date = date('Y-m-d H:i:s');
        $order->total_price = str_replace(',', '', (Cart::total()));
        $order->status = config('customer.order.default_status');
        $check_order = $order->save();
        if(!$check_order) {
            session()->flash('error', trans('master.failtOrder'));
            
            return back();
        }
        DB::transaction(function () use ($order)
        {
            foreach (Cart::content() as $item) {
                $food_order = new FoodOrder();
                $food_order->order_id = $order->id;
                $food_order->food_id = $item->id;
                $food_order->quantity = $item->qty;
                $food_order->price = $item->subtotal;
                $food_order->save();
            }
        });
        Cart::destroy();
        session()->flash('message', 'Order Successfully');

        return redirect()->route('order_detail', $order->id);
    }

    public function destroyCart()
    {
        Cart::destroy();
        
        return back();
    }

    public function show()
    {
        return Cart::content();
    }
}
