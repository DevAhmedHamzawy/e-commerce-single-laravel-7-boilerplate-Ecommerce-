<?php
namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LocalizationController extends Controller {
    public function index($locale){
        App::setlocale($locale);
        session()->put('locale', $locale);
        
        
        if(\URL::previous() == env('APP_URL').'/summary'){
            return redirect('shipping_address');
        }

        if(\URL::previous() == env('APP_URL').'/the_summary'){
            return redirect('the_shipping_address');
        }
        
        return redirect()->back();
    }
}