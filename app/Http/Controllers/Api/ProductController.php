<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    public function mostSold()
    {
        return ProductResource::collection(Product::whereIn('id', DB::table('order_items')->select('product_id', DB::raw('count(*) as total'))->groupBy('product_id')->pluck('product_id'))->get());
    }

    public function productOffers()
    {
        return ProductResource::collection(Product::where('discount', '!=', 0)->get());
    }


    public function productBestOffers()
    {
        return ProductResource::collection(Product::where('discount', '!=', 0)->orderByDesc('discount')->get());
    }

    public function productBestViews()
    {
        return ProductResource::collection(Product::where('discount', '!=', 0)->inRandomOrder()->get());
    }

    public function productBestRating()
    {
        $products = Product::all();

        $productsFiltered = $products->filter(function($product){
            return $product->ratings->avg('rating') > 3;
        });

        return ProductResource::collection($productsFiltered);
    }

    public function specialProducts()
    {
        return ProductResource::collection(Product::whereSpecial(1)->get());
    }


}
