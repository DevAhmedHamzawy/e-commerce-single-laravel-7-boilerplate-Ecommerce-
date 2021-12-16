<?php

namespace App\Upload;

use Illuminate\Support\Str;

class Upload
{
    public static function uploadImage($image, $sectionName, $name){
        
        $fileName = Str::slug($name) . '.' . $image->getClientOriginalExtension();
        $image->storePubliclyAs("public/main/${sectionName}/", $fileName);
    
        return $fileName;
    }


    public static function uploadAttachments($attachments,$productName){

        $other_images = [];

        // Add The Attachments
        foreach (self::secure_iterable($attachments) as $attachment) {
            array_push($other_images ,self::uploadImage($attachment, "other_images/${productName}" , $productName."_".rand(0,100000)));
        }

        return $other_images;
    }


    public static function mergeAttachments($product, $the_attachment_main){
        
        if($the_attachment_main != null) 
        {
            $the_attachment_main = array_map(function($n) { return basename($n); } , $the_attachment_main);

            $other_images = array_merge(json_decode($product->other_images), $the_attachment_main);

            $product->other_images = json_encode($other_images);
        }

        return $product->other_images;
    }
    

    private static function secure_iterable($var)
    {
        return is_iterable($var) ? $var : array();
    }
}