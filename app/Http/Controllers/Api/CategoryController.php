<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoryResource;
use App\Product;
use App\Settings;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::whereCategoryId(Null)->get());
    }

    public function getSpecificCategories()
    {
        $categoryIds = json_decode(Settings::findOrFail(1)->category_ids_main_page_app);

        $categories = Category::whereIn('id', $categoryIds)->with('subcategories')->get();

        
        foreach ($categories as $category) {
    
            if(!empty($category->subcategories)){
                $ids = $category->subcategories->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['id'])
                        ->all();
                });    


                $category->products = Product::whereIn('category_id', $ids)->get();
            }
        }
        
       
        return CategoryResource::collection($categories);
    }
}
