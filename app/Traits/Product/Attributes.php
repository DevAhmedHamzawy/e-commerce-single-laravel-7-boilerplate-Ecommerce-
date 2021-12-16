<?php 

namespace App\Traits\Product;

use App\Settings;

Trait Attributes{

    public function getImgPathAttribute()
    {
        //return !file_exists(asset('storage/main/products/'. $this->image)) ? Settings::findOrFail(1)->root_img_path.'/'.$this->image  : asset('storage/main/products/'. $this->image);
        //return url('../storage/app/public/main/products/'. $this->image);
        //return url('storage/main/products/'.$this->image);
        //return $this->from_api == 1 ? Settings::findOrFail(1)->root_img_path.'/'.$this->image  : asset('storage/main/products/'. $this->image);
        //return $this->from_api == 1 ? Settings::findOrFail(1)->root_img_path.'/'.$this->image  : asset('storage/app/public/main/products/'. $this->image);
        return 'https://s1.hesabate.com/bills/db_13065p116.gif';
    }

    public function getOtherImagesPathAttribute()
    {
        $images = [];
        if($this->other_images !== null){
            //$the_other_images = json_decode(json_decode(($this->other_images), true));

            $the_other_images = json_decode(($this->other_images), true);

            foreach($the_other_images as $other_image)
            {
                $other_image = url('storage/app/public/main/other_images/'.$this->name_ar.'/'. $other_image);
                //$other_image = url('storage/main/other_images/'.$this->name_ar.'/'. $other_image);
                array_push($images, $other_image);
            }
        }

        return $images;
    }

    public function getThePriceAttribute()
    {
        return $this->price.' '.Settings::findOrFail(1)->currency;
    }

    public function getTheDiscountAttribute()
    {
        return $this->discount == null ? null : $this->discount.' '.Settings::findOrFail(1)->currency;
    }

    //Check If User Added A Specific Product To His Favourites
    public function getFavouriteAttribute()
    {
        if(!auth()->user()) { return false; }
        return auth()->user()->favourites()->whereProductId($this->id)->exists();
    }
}


?>