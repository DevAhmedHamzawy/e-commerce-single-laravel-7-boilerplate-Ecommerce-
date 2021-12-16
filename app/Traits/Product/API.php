<?php 

namespace App\Traits\Product;

use App\Product;
use Illuminate\Support\Facades\DB;

Trait API{
    
    public static function addToCart($product_id, $qty, $options, $lang, $user_id = null)
    {
        $product_ids = $product_id;
        $product_Qty = $qty;
        $product_options = $options;
        $discounts = [];

        //if(DB::table('shoppingcart')->where('identifier', auth()->user()->id)->exists()) {  DB::table('shoppingcart')->where('identifier', auth()->user()->id)->delete(); }

       // for ($i=0; $i < count($product_ids) ; $i++) { 

            $product = Product::findOrFail($product_ids);
            $product->discount != 0 ? $price = $product->discount * $product_Qty : $price = $product->price * $product_Qty;

            //$price = number_format((float)$price,2);

            //array_push($discounts, $price - ($price * ($product->discount / 100)));            
            //array_sum($discounts) <= 0 ? : Cart::setDiscount(array_sum($discounts));

         
            //json_encode($product_options[$i])
            //var_dump($product_options[$i]);return;


            DB::table('shoppingcart')->insert(['instance' => auth()->user()->id ?? $user_id, 'identifier' => auth()->user()->id ?? $user_id, 'product_id' => $product_ids , 'product_options' => $product_options,  'qty' => $product_Qty ,
            'content' => json_encode(['product_id' => $product->id, 'product_name' => $product->{'name_' . $lang} ?? $product->name_ar, 'product_image' => $product->img_path , 'product_qty' => $product_Qty, 'product_price' => $price , 'product_options' =>  $product_options ])]);

            
            //Cart::store(auth()->user()->id);
       // }
    }

}

?>