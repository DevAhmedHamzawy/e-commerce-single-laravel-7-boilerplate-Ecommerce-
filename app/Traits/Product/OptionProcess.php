<?php 

namespace App\Traits\Product;

use App\Option;

Trait OptionProcess{

    public static function OptionProcess($options)
    {
        $newOptions = [];

        foreach(self::secure_iterable($options) as $key => $value) {

            
            $options = json_decode(Option::findOrFail($key)->options_ar);

            $newOptions[$key] = [];

            foreach(self::secure_iterable($options) as $key1 => $value1){
                
                array_push($newOptions[$key], array_search((string)$key1, $value));
            }

        }


        return $newOptions;
    }

    private static function secure_iterable($var)
    {
        return is_iterable($var) ? $var : array();
    }

}



?>