<?php

namespace App\Http\Controllers;

use App\Product;
use App\Settings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $tax = Settings::findOrFail(1)->vat;
        return view('main.cart.index')->withCart(Cart::content())->withGlobalTax(Cart::setGlobalTax($tax))->withTaxes(Cart::tax())->withSubTotal(Cart::subtotal())->withTotal(Cart::total());
    }

    public function store(Product $product, Request $request)
    {
        $options = array_combine(explode(",", $request->options),explode(",", $request->main_options));
        
        $product->discount > 0 ? $price = $product->discount : $price = $product->price;

        $locale = session()->get('locale');
        Cart::add($product->id, $product->{'name_' . $locale} != "" ? $product->{'name_' . $locale} : $product->name_ar, 1, $price, 0, $options)->associate('App\Product');
        return $request->type == 'buy_now' ? redirect()->to('cart') : redirect()->back();   
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return redirect()->route('cart.index');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index');
    }
}
