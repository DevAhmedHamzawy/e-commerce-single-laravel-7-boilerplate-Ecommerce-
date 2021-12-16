<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });
});

Route::group(['middleware' => ['auth:api']],function(){

    Route::post('add_to_cart', 'Api\CartController@store');
    Route::get('show_cart', 'Api\CartController@show');
    Route::post('update_cart', 'Api\CartController@update');
    Route::post('delete_cart', 'Api\CartController@delete');

    Route::post('check_out', 'Api\CartController@checkOut');
    Route::post('summary', 'Api\CartController@summary');
    Route::post('shipping_address', 'Api\ShippingAddressController@store');

 

    Route::post('update_user', 'Api\UserController@update');


    Route::post('save_order', 'Api\OrderController@store');

    Route::post('save_favourite', 'Api\FavouriteController@store');

});


// Invoice
Route::get('/get_invoice/{order}', 'Api\InvoiceController@invoice')->name('get_invoice');

Route::post('search', 'Api\SearchController@index');


// List Categories And Sub Categories
Route::get('the_categories', 'Api\CategoryController@index')->name('get_categories');
Route::get('the_sub_categories/{id}', 'Api\TheSubCategoryController@index')->name('get_subcategories');

// List The Product & Show the Product
Route::get('the_products', 'Api\ProductController@index')->name('get_products');
Route::get('the_products/{id?}', 'Api\ProductController@show')->name('get_the_product');

// Show The Settings
Route::get('the_settings', 'Api\SettingsController@index')->name('get_settings');

// Show The All Pages
Route::get('the_pages', 'Api\PageController@index')->name('get_pages');

// Show Sliders
Route::get('main_sliders', 'Api\SliderController@main')->name('get_main_sliders');
Route::get('the_sliders/{id?}', 'Api\SliderController@byCategory')->name('get_sliders_by_category');

// Show Brands ("Vendors")
Route::get('brands', 'Api\VendorController@index')->name('get_brands');

// Most Selling Products
Route::get('most_selling_products', 'Api\ProductController@mostSold');

// Product Offers
Route::get('product_offers', 'Api\ProductController@productOffers');

// Cities
Route::get('get_cities', 'Api\CityController@index');


/*---------------------- E-commerce Procedures In Case Of User Not Authenticated -----------------------*/

Route::post('not_auth_add_to_cart', 'Api\NotAuthCartController@store');
Route::get('not_auth_show_cart', 'Api\NotAuthCartController@show');
Route::post('not_auth_update_cart', 'Api\NotAuthCartController@update');
Route::post('not_auth_delete_cart', 'Api\NotAuthCartController@delete');

Route::post('not_auth_check_out', 'Api\NotAuthCartController@checkOut');
Route::post('not_auth_summary', 'Api\NotAuthCartController@summary');
Route::post('not_auth_shipping_address', 'Api\NotAuthShippingAddressController@store');

Route::post('not_auth_save_order', 'Api\NotAuthOrderController@store');

Route::post('get_coupon', 'Api\CouponController@index')->name('get_coupon');

Route::get('get_specific_categories', 'Api\CategoryController@getSpecificCategories');

Route::get('product_best_offers', 'Api\ProductController@productBestOffers');
Route::get('product_best_views', 'Api\ProductController@productBestViews');
Route::get('product_best_ratings', 'Api\ProductController@productBestRating');

Route::get('special_products', 'Api\ProductController@specialProducts');