<?php

namespace App\Http\Controllers\Api;

use App\Coupon;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        if(!Coupon::whereName($request->coupon)->exists()) { return response()->json(['message' => 'coupon not invalid'], 422); }


        $created = Carbon::parse(Coupon::whereName($request->coupon)->first()->created_at->toDateTimeString());
        $now = Carbon::now();
        $diff = $created->diffInDays($now);

        if($diff > Coupon::whereName($request->coupon)->first()->duration) { return response()->json(['message' => 'coupon expired'], 422); }
        
        return response()->json($request->total - Coupon::whereName($request->coupon)->first()->discount, 200); 
    }
}
