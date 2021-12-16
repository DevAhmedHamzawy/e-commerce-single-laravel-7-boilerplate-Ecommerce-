<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use App\Settings;
use App\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{
    public function getShippingAddress()
    {
        return view('main.checkout.shipping_address', ['cities' => City::all()]);
    }

    public function storeShippingAddress(Request $request)
    {

        $validator = Validator::make($request->all(), ['city_id' => 'numeric|required', 'name' => 'required', 'email' => 'required' , 'address' => 'required', 'telephone' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $user = auth()->user();
        
        $user->shippingAddresses()->create($request->all());

        return redirect('summary');
    }

    public function storeTheShippingAddress(Request $request)
    {

        $validator = Validator::make($request->all(), ['city_id' => 'numeric|required', 'name' => 'required', 'email' => 'required' , 'address' => 'required', 'telephone' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

        $request->merge(['user_id' => rand(0,9999)]);

        session()->put('user_id', $request->user_id);

        $shippingAddress = ShippingAddress::create($request->all());

        return redirect('the_summary')->withAddress($shippingAddress);
    }

    public function summary()
    {
        $tax = Settings::findOrFail(1)->vat;
        return view('main.checkout.summary')->withCart(Cart::content())->withCount(Cart::count())->withGlobalTax(Cart::setGlobalTax($tax))->withTaxes(Cart::tax())->withSubTotal(Cart::subtotal())->withTotal(Cart::total());
    }

    public function success($sort = null)
    {
        $sort == 'delivering' ? $sort = 'delivering' :  $sort = 'myFatoorah';

        return auth()->user() ? redirect()->route('save_order',$sort) : redirect()->route('save_the_order',$sort);
    }

    public function fail()
    {
        return view('main.delivering.fail');
    }
}
