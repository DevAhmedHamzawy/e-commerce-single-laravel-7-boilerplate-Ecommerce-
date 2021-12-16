<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function list($id)
    {
        return Category::where('category_id',$id)->get();
    }
}
