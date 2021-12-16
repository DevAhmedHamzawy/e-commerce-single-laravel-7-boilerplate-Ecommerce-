<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\ProductResource;
use App\Option;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        if($category->category_id == null) {
           
            $category = Category::whereId($category->id)->with('subcategories')->firstOrFail();

            $ids = $category->subcategories->map(function ($s) {
                return collect($s->toArray())
                    ->only(['id'])
                    ->all();
            });

            $products =  Product::whereIn('category_id', $ids)->get();
            
            
            return view('main.products.index', compact('products','category'));
        }
        
        $category->subcategories = Category::whereCategoryId($category->category_id)->get();
        $products = Product::whereCategoryId($category->id)->get();
        return view('main.products.index', compact('products','category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

         // Get The Product Options
         $the_options = json_decode($product->options);
         
         // Initialize Array For The Only Available Checked Options
         $optionsArray = [];
 
         if($the_options != []){
             foreach ($the_options as $key => $value) {
               
                 // Get The Option's Whole Object
                 $option = Option::findOrFail($key);
 
                 // Put The Property Id As Array Value 
                 $optionsArray[$option->id] = [];
 
                 // get The Pure Original Options Of The Product
                 $the_pure_options = json_decode($option->options_ar);
              
                 // Put Only The Selected Once As Available In The Array  
                 for ($i=0; $i < count($the_pure_options); $i++) { !isset($value[$i]) ? : !is_numeric($value[$i]) ? : array_push($optionsArray[$option->id],['name' => $option->name_ar , 'value' => $the_pure_options[$i]]); }
 
             }
         }

        $options = $optionsArray; 
        $category = Category::findOrFail($product->category_id);
        $mainCategory = Category::findOrFail($category->category_id);

        $similarProducts = Product::whereCategoryId($category->id)->inRandomOrder()->limit(3)->get();
        return view('main.products.show', compact('product', 'category', 'mainCategory', 'options', 'similarProducts'));
    }

}
