<?php

namespace App\Http\Controllers\Api;

use App\ShippingAddress;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingAddressController extends Controller
{
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['city_id' => 'numeric|required', 'name' => 'required', 'email' => 'required' , 'address' => 'required', 'telephone' => 'required']);

        if($validator->fails()){
            return response()->json($validator->messages(), 422);
        }
        
        $shippingAddress = auth()->user()->shippingAddresses()->create($request->all());
        
        $shippingAddress->shipping_cost = City::findOrFail($request->city_id)->shipping_cost;
        
        return response()->json($shippingAddress);
    }
}
