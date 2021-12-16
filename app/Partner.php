<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    public function getImgPathAttribute()
    {
        //return asset('storage/main/partners/' . $this->image);
        return url('storage/app/public/main/partners/'. $this->image);
    }
}
