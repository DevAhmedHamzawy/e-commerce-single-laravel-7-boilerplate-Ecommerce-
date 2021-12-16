<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        !Coupon::whereName($request->coupon)->exists() ? : Cart::setGlobalDiscount(Coupon::whereName($request->coupon)->first()->discount);        
    
        // get The Shipping Address
        $shippingAddress = ShippingAddress::whereUserId(session()->get('user_id'))->firstOrFail();

        return redirect()->back()->withAddress($shippingAddress);
    }
}