<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Coupon;
use Carbon\Carbon;
use App\Slider;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,  Category $category)
    {

        if ($request->ajax()) {

            $coupons = Coupon::all();

            return DataTables::of($coupons)->addIndexColumn()
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("coupons.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.coupons.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), ['name' => 'required', 'duration' => 'required', 'discount' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        Coupon::create($request->except('_token'));
        return redirect()->back()->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);
    }

    public function main(Slider $slider)
    {
        $slider->main_page ^= 1 ;
        $slider->update();

        return redirect()->back()->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);
    }
}
