<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'name_ar';
    }
}
