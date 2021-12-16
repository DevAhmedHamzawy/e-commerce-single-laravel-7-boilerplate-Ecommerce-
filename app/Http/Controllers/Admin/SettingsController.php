<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Icon;
use App\Page;
use App\Settings;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{

    public function index()
    {
        return view('admin.settings.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.settings.edit', ['settings' => Settings::findOrFail(1), 'categories' => Category::whereCategoryId(null)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), ['name_ar' => 'required|sometimes', 'about_ar' => 'required|sometimes', 'telephone' => 'required|sometimes', 'email' => 'required|sometimes', 'commission_percentage' => 'required|sometimes|numeric']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        if ($request->has('the_first_image')) {
            $request->merge(['first_image' => Upload::uploadImage($request->the_first_image, 'settings' , rand(0,10000000))]);
        }

        if ($request->has('the_second_image')) {
            $request->merge(['second_image' => Upload::uploadImage($request->the_second_image, 'settings' , rand(0,10000000))]);
        }
        
        Settings::whereId(1)->update($request->except('_token','_method','1','0','the_first_image','the_second_image'));
        return redirect()->back();
    }
}
