<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Option;
use App\Upload\Upload;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $products = Product::all();

            return DataTables::of($products)->addIndexColumn()
            ->addColumn('action', function($row){ if($row->special == 0){ $btn = '<a href="'.route("products.special", [$row->slug]).'" class="edit btn btn-primary btn-sm">اضافة منتج مميز</a>';return $btn; }else{ $btn = '<a href="'.route("products.special", [$row->slug]).'" class="edit btn btn-primary btn-sm">حذف منتج مميز</a>';return $btn; }})
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("products.edit", [$row->slug]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("products.delete", [$row->slug]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['action','actionone','actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::all();
        $categories = Category::whereCategoryId(null)->get();
        return view('admin.products.add', compact('options', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        // initiate some requests
        $request->merge(['slug' => Str::slug(request('name_ar')), 'image' => Upload::uploadImage($request->main_image, 'products' , $request->code), 'options' => json_encode(Product::OptionProcess($request->the_other_options))]);
        
        // create the product
        $product = Product::create($request->except('the_other_options', 'main_image', 'the_attachment'));

        // assign the product name in arabic
        $productName = $product->name_ar;
        
        // upload the other images
        $product->other_images = json_encode(Upload::uploadAttachments($request->the_attachment, $productName));
        
        // update the product
        $product->update();

        // redirect back
        return redirect()->route('products.index')->withMessage('تم إضافة منتج جديد بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show')->withProduct($product)->withSubproducts($product->subproducts());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // get All Options
        $options = Option::all();

        // get All Categories
        $categories = Category::whereCategoryId(null)->get();

        // Get Current Category Then Current SubCategory
        $subCategory = Category::where('id', $product->category_id)->first();
        $subCategory == null ? $category = null : $category = Category::where('id', $subCategory->category_id)->first()->id;
        $theCategory = $category;
        $theSubCategory = $subCategory;

        // Get The Selected Options
        $selectedOptions = (array)json_decode($product->options);

        // return edit view
        return view('admin.products.edit', compact('options', 'categories', 'product', 'theCategory', 'theSubCategory', 'selectedOptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        
        // Main Image Check If Changed
        if($request->has('main_image')) { $request->merge(['image' => Upload::uploadImage($request->main_image, 'products' , $request->code)]); }

        // Initiate Requests
        $request->merge(['slug' => Str::slug(request('name_ar')), 'options' => Product::OptionProcess($request->the_other_options)]);
        $product->update($request->except('the_other_options', 'main_image', 'the_attachment', 'the_attachment_main'));
        
        // initiate the product name in arabic
        $productName = $product->name_ar;
      
        // Add The Attachments
        $product->other_images = json_encode(Upload::uploadAttachments($request->the_attachment, $productName));

        // merge the old attachments with the new attachments
        if($request->has('the_attachment')){ $product->other_images = Upload::mergeAttachments($product, $request->the_attachment_main); }

        // update product
        $product->update();

        // return redirect to products 
        return redirect()->route('products.index')->withMessage('تم تعديل المنتج بنجاح');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->withMessage('تم حذف المنتج بنجاح');   
    }

    public function special(Product $product)
    {
        $product->special ^= 1 ;
        $product->update();

        return redirect()->back()->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);
    }

}
