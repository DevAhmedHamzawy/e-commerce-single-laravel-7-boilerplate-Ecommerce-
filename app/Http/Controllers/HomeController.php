<?php

namespace App\Http\Controllers;

use App;
use App\Category;
use App\Order;
use App\Partner;
use App\Product;
use App\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main.home');
    }

    public function welcome()
    {
        if ((session()->has('locale'))) {
            App::setlocale(session()->get('locale'));
            session()->put('locale', session()->get('locale'));

        }else {
            App::setlocale('ar');
            session()->put('locale', 'ar');
        }
       
        return view('main.welcome')->withMainSliders(Slider::whereMainPage(1)->get())->withProducts(Product::take(10)->get())->withCategorySpecific(Category::findOrFail(1))->withSpecialProducts(Product::whereSpecial(1)->take(10)->get());
    }

    public function invoice(Order $order)
    {
        return view('invoice.show', compact('order'));
    }
}
