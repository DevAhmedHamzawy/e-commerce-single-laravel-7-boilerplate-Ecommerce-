<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use App\Order;
use App\Product;
use App\Settings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class NotAuthOrderController extends Controller
{
    public function store(Request $request)
    {

        $cart =  DB::table('shoppingcart')->where('identifier', $request->user_id)->get();

        $sub_total = [];
        $tax_rates = [];
        $discount_rates = [];

        foreach($cart as $item){
           $item = json_decode($item->content);


           array_push($sub_total, $item->product_price*$item->product_qty);
           array_push($tax_rates, round($item->product_price / 100) * Settings::findOrFail(1)->vat, 2);
        }
      
     
        $sub_total = array_sum($sub_total);

        $tax_rates = array_sum($tax_rates);


        $total = $sub_total + $tax_rates; 


        $order = Order::create(['user_id' => $request->user_id ,'vat_rate' => $tax_rates, 'vat' =>  Settings::findOrFail(1)->vat, 'sub_total' =>  $sub_total, 'total' => $total, 'city_id' => $request->city_id , 'sort' => 'الدفع عند الإستلام' , 'status' => 'تم الإستلام']);


        foreach($cart as $item){

            $item = json_decode($item->content);

            $order->items()->create(['product_id' => $item->product_id, 'price' => $item->product_qty, 'qty' => $item->product_qty, 'options' => $item->product_options]);
        }

        DB::table('shoppingcart')->where('identifier', $request->user_id)->delete();

        return ['order' => $order];
    }
}
