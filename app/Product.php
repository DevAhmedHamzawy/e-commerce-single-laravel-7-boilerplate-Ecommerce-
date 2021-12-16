<?php

namespace App;

use App\Traits\Product\API;
use App\Traits\Product\Attributes;
use App\Traits\Product\Chart;
use App\Traits\Product\OptionProcess;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use OptionProcess, Chart, Attributes, API;

    protected $guarded = [];

    protected $appends = ['img_path'];

    protected $with = ['ratings'];

    public function getRouteKeyName()
    {
        return 'slug';
    }    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
