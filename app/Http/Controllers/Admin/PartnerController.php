<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partners.index', ['partners' => Partner::all()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['the_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $request->merge(['image' => Upload::uploadImage($request->the_image, 'partners' , rand(0,999999))]);
        Partner::create($request->except('_token','the_image'));
        return redirect()->route('partners.index')->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);
    }
}
