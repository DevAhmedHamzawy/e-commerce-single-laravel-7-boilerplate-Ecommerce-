<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Settings;
use App\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store($sort = null)
    {
        $vat = Settings::findOrFail(1)->vat;
        Cart::setGlobalTax($vat);
        $user = auth()->user();
        
        $sort == 'delivering' ? $sort = 'الدفع عند الإستلام' :  $sort = 'من خلال myFatoorah';

        if($user){
        $order = $user->orders()->create(['city_id' => auth()->user()->latestShippingAddress->city_id ,'vat_rate' => $vat, 'vat' => Cart::tax(), 'sub_total' =>  Cart::subtotal(), 'total' => Cart::total() + \App\City::find(auth()->user()->latestShippingAddress->city_id)->shipping_cost ?? 0  , 'status' => 'تم الإستلام', 'sort' => $sort]);
        }else {
        $order = Order::create(['user_id' => session()->get('user_id'), 'city_id' => ShippingAddress::whereUserId(session()->get('user_id'))->firstOrFail()->city_id , 'vat_rate' => $vat, 'vat' => Cart::tax(), 'sub_total' =>  Cart::subtotal(), 'total' => Cart::total() + \App\City::find(ShippingAddress::whereUserId(session()->get('user_id'))->firstOrFail()->city_id)->shipping_cost ?? 0 , 'status' => 'تم الإستلام', 'sort' => $sort]);
        session()->forget('user_id');
        }

        foreach(Cart::content() as $item){
            $order->items()->create(['product_id' => $item->model->id, 'price' => $item->price, 'qty' => $item->qty, 'options' => 0]);
        }

        Cart::destroy();

        return view('main.delivering.success');
    }

    public function show($id)
    {
        $order = Order::whereId($id)->with('items')->firstOrFail();

        return view('main.profile.orders.show', compact('order'));
    }
}
