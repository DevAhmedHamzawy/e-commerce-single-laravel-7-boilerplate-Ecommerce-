<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    
    
    public function getImgPathAttribute()
    {
        return asset('storage/main/contacts/'. $this->image);
    }
}
