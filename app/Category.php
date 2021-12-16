<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategories()
    {
        return $this->hasMany('App\Category', 'category_id')->whereNotNull('category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'category_options');
    }

    public function getImgPathAttribute()
    {
        return $this->image != NULL ? url('storage/app/public/main/categories/'. $this->image) : url('storage/app/public/main/categories/category.png');
    }
}
