<?php

namespace App\Http\Resources;

use App\Category;
use App\Option;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $category = Category::find($this->category_id);

        if($category == null) { dd($this->category_id); }

        $mainCategory = Category::whereId($category->category_id)->first() ?? null;

        // Get The Product Options
        $the_options = json_decode($this->options);

        // Initialize Array For The Only Available Checked Options
        $optionsArray = [];

        if($the_options != []){
            foreach ($the_options as $key => $value) {

                // Get The Option's Whole Object
                $option = Option::find($key);

                if(empty($option)) { dd($this->id); }

                // Put The Property Id As Array Value 
                $optionsArray[$option->id] = [];

                // get The Pure Original Options Of The Product
                $the_pure_options = json_decode($option->options);

                if(empty($the_pure_options)) { dd($this->id); }

                // Put Only The Selected Once As Available In The Array  
                for ($i=0; $i < count($the_pure_options); $i++) { !isset($value[$i]) ? : !is_numeric($value[$i]) ? : array_push($optionsArray[$option->id],['name' => $option->name , 'value' => $the_pure_options[$i]]); }

            }
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'name' => $this->{'name_' . $request->lang} ?? $this->name_ar,
            'slug' => $this->slug,
            'image' => $this->img_path,
            'price' => $this->price,
            'discount' => $this->discount,
            //'price_sale' => $this->price - ($this->price * ($this->discount / 100)),
            'price_sale' => $this->discount == 0 ? $this->price : $this->discount,
            'description' => $this->{'description' . $request->lang} ?? $this->description_ar, 
            'options' =>  $optionsArray,
            'special' => $this->special,
            'user' => new UserResource($this->whenLoaded('user')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'main_category' => new CategoryResource($mainCategory),
            'ratings' => new RatingResource($this->whenLoaded('ratings')),
        ];
    }
}
