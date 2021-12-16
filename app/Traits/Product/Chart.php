<?php

namespace App\Traits\Product;

use App\Category;

Trait Chart{

     //Count Posts By Month
     public Static function FindProductsByMonth($categoryName, $monthNumber)
     {   
         $category = Category::whereNameAr($categoryName)->first();
         //return Self::whereYear('created_at' , Carbon::now()->year)->whereMonth('created_at' , $monthNumber)->whereCategoryId($category->id)->count();
         //return self::whereYear('created_at' , Carbon::now()->year)->whereMonth('created_at' , $monthNumber)->get();
         return rand(0,50);
     }


   //Count Categories
   public static function CountCategories()
   {
        $categories = Category::whereCategoryId(null)->get();
        $countCategories = [];
        
        foreach($categories as $key => $value)
        {
           $key = $value->name;
           $countCategories[$key] = [];
           //$countCategories[$key] = count($value->posts);
           $countCategories[$key] = rand(0,100);
        }
 
        return $countCategories;
   }

}




?>