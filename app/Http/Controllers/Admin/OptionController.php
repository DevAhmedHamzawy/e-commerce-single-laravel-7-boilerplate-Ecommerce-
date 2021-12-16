<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $options = Option::all();

            return DataTables::of($options)->addIndexColumn()
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("options.edit", [$row->id]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("options.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['action','actionone','actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.options.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.options.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name_ar' => 'required', "options_ar" => "required|array|min:1", "options_ar.*" => "required|string|distinct|min:1"]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        if($request->has('options_ar')){
            //$options_ar = array_combine(array_filter($request->options_ar, function ($k) {return !($k&1);}, ARRAY_FILTER_USE_KEY), array_filter($request->options_ar, function ($k) {return ($k&1);}, ARRAY_FILTER_USE_KEY));
    
            $options_ar = array_filter($request->options_ar);
    
           $request->merge(['options_ar' => $options_ar]);
        }

        if($request->has('options_en')){
            //$options_en = array_combine(array_filter($request->options_en, function ($k) {return !($k&1);}, ARRAY_FILTER_USE_KEY), array_filter($request->options_en, function ($k) {return ($k&1);}, ARRAY_FILTER_USE_KEY));
    
            $options_en = array_filter($request->options_en);
    
           $request->merge(['options_en' => $options_en]);
        }

        $request->merge(['options_ar' => json_encode($request->options_ar), 'options_en' => json_encode($request->options_en)]);

        Option::create($request->all());
        return redirect()->route('options.index')->with('status', 'option Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $option->options_ar = json_decode($option->options_ar);
        $option->options_en = json_decode($option->options_en);

        return view('admin.options.edit')->withOption($option);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //dd($request->options_ar);
        
        if($request->has('options_ar')){
            //$options_ar = array_combine(array_filter($request->options_ar, function ($k) {return !($k&1);}, ARRAY_FILTER_USE_KEY), array_filter($request->options_ar, function ($k) {return ($k&1);}, ARRAY_FILTER_USE_KEY));
    
            $options_ar = array_filter($request->options_ar);
    
           $request->merge(['options_ar' => $options_ar]);
        }

        if($request->has('options_en')){
            //$options_en = array_combine(array_filter($request->options_en, function ($k) {return !($k&1);}, ARRAY_FILTER_USE_KEY), array_filter($request->options_en, function ($k) {return ($k&1);}, ARRAY_FILTER_USE_KEY));
    
            $options_en = array_filter($request->options_en);
    
           $request->merge(['options_en' => $options_en]);
        }

        $request->merge(['options_ar' => json_encode($request->options_ar), 'options_en' => json_encode($request->options_en)]);

        $option->update($request->all());
        return redirect()->route('options.index')->with('status', 'option Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->back()->with('status', 'option Deleted Successfully');   
    }
}
