<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Settings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;

class FetchDataOutside extends Controller
{

    public function categories()
    {
        $data = $this->fetch(Settings::findOrFail(1)->root_api.'/store_api.php'.'?username='.Settings::findOrFail(1)->root_username.'&'.'password='.Settings::findOrFail(1)->root_password.'&action=download&type=categoryJ');
     
        //dd($data);

        foreach ($data->table as $item) {



            if(!Category::whereNameAr($item->name_ar)->exists()){
                if($item->category_id != 0){
                    $mainCategory = Category::whereApiId($item->category_id)->first();
                
                    if($mainCategory != null){
                        Category::create(['name_ar' => $item->name_ar, 'name_en' => $item->name_en, 'slug' => Str::slug($item->name_en), 'description_ar' => 'س' , 'description_en' => 's', 'visible' => 1, 'api_id' => $item->id, 'category_id' => $mainCategory->id]);
                    }
                    
                }else{
                    Category::create(['name_ar' => $item->name_ar, 'name_en' => $item->name_en, 'slug' => Str::slug($item->name_en), 'description_ar' => 'س' , 'description_en' => 's', 'visible' => 1, 'api_id' => $item->id]);
                }
            }

        }

        return redirect()->back()->withMessage('تمت العملية بنجاح');
    }

    public function products()
    {
        $data = $this->fetch(Settings::findOrFail(1)->root_api.'/store_api.php'.'?username='.Settings::findOrFail(1)->root_username.'&password='.Settings::findOrFail(1)->root_password.'&action=download&type=productsJ');

        //dd($data);

        foreach ($data->table as $item) {

            if(!Product::whereNameAr($item->name_ar)->exists()){

                if(Category::whereApiId($item->category_id)->exists()){

                    $category_id = Category::whereApiId($item->category_id)->first()->id;

                    Product::create(['user_id' => 0, 'category_id' => $category_id, 'name_ar' => $item->name_ar, 'name_en' => $item->name_en, 'slug' => Str::slug($item->name_ar), 'description_ar' => 'س' , 'description_en' => 's', 'brief_description_ar' => '' , 'brief_description_en' => '', 'code' => $item->barcode, 'price' => $item->price, 'image' => $item->item_img , 'from_api' => 1 , 'options' => '']);

                }
            }
        }

        return redirect()->back()->withMessage('تمت العملية بنجاح');
    }


    public function fetch($url)
    {
        //  Initiate curl
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        return json_decode($result);
    }
}
