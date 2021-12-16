<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Request $request)
    {
        return auth()->user()->favourites()->whereProductId($request->product_id)->exists() ? auth()->user()->favourites()->whereProductId($request->product_id)->delete() : auth()->user()->favourites()->create($request->all());
    }
}
