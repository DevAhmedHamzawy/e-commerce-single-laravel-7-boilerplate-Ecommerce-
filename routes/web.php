<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Change Language
Route::get('lang/{lang}', 'LocalizationController@index')->name('language');

// Welcome
Route::get('/', 'HomeController@welcome')->name('welcome');

// Invoice
Route::get('/invoice/{order}', 'HomeController@invoice')->name('invoice');

// search
Route::get('/search', 'SearchController@index')->name('search');

// Products By Category
Route::get('/the_products/{category}', 'ProductController@index')->name('the_products.index');

// Show Product
Route::get('/the_product/{product}', 'ProductController@show')->name('the_products.show');

// Contacts
Route::get('contact_us', 'ContactController@show')->name('contact_us');
Route::post('sendcontact', 'ContactController@store');

// Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/add_to_cart/{product}', 'CartController@store')->name('cart.store');
Route::post('/update_cart', 'CartController@update')->name('cart.update');
Route::get('/remove_from_cart/{rowId}', 'CartController@destroy')->name('cart.destroy');

// pages
Route::get('the_page/{the_page}', 'PageController@showWeb')->name('the_page');

Route::get('get_discount', 'CouponController@apply')->name('get_discount');

// The Shipping Address
Route::get('/the_shipping_address', 'CheckOutController@getShippingAddress')->name('the_shipping_address');
Route::post('/save_the_shipping_address', 'CheckOutController@storeTheShippingAddress')->name('save_the_shipping_address');

// The Order Summary
Route::get('/the_summary', 'CheckOutController@summary')->name('the_summary');

// The Order
Route::get('/save_the_order/{sort}', 'OrderController@store')->name('save_the_order');

// The Payment
Route::post('/the_payment/{sort}', 'PaymentController@store')->name('the_payment');

// If Payment Success => success , If Payment Fail => fail
Route::get('/success/{sort}', 'CheckOutController@success')->name('success');
Route::get('/fail', 'CheckOutController@fail')->name('fail');

Route::group(['middleware' => 'auth'], function (){

    // Home
    Route::get('/home', 'HomeController@index')->name('home');

    // Shipping Address
    Route::get('/shipping_address', 'CheckOutController@getShippingAddress')->name('shipping_address');
    Route::post('/save_shipping_address', 'CheckOutController@storeShippingAddress')->name('save_shipping_address');

    // Order Summary
    Route::get('/summary', 'CheckOutController@summary')->name('summary');

    // Order
    Route::get('/save_order/{sort}', 'OrderController@store')->name('save_order');
    Route::get('/order/{id}', 'OrderController@show')->name('show_order');

    //Payment
    Route::post('/payment/{sort}', 'PaymentController@store')->name('payment');

    //Favourite
    Route::post('/favourite', 'FavouriteController@store')->name('favourite');

    //Get Favourites
    Route::get('the_favourites', function () {
        return view('main.profile.favourites.index');
    })->name('get_favourites');

    // Rating
    Route::post('/ratingStar', 'RatingController@store')->name('ratingStar');
});




// DON'T Put it inside the '/admin' Prefix , Otherwise you'll never get the page due to assign.guard that will redirect you too many times
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


Route::get('list_subcategories/{id}', 'SubCategoryController@list')->name('list_subcategories');

Route::get('list_options/{id}', 'OptionController@list')->name('list_options');



Auth::routes(['verify' => true]);



Route::group(['middleware' => ['assign.guard:admin,admin/login'] , 'prefix' => 'admin'],function(){

  

    Route::get('dashboard', 'Admin\DashboardController@index');

    Route::resource('categories', 'Admin\CategoryController');
    Route::get('categories/{category}/delete', 'Admin\CategoryController@destroy')->name('categories.delete');

    Route::resource('categories/{category}/subcategories', 'Admin\SubcategoryController');
    Route::get('categories/{category}/subcategories/{subcategory}/delete', 'Admin\SubcategoryController@destroy')->name('subcategories.delete');

    Route::resource('products', 'Admin\ProductController');
    Route::get('products/special/{product}' , 'Admin\ProductController@special')->name('products.special');
    Route::get('products/{product}/delete', 'Admin\ProductController@destroy')->name('products.delete');

    Route::resource('options', 'Admin\OptionController');
    Route::get('options/{option}/delete', 'Admin\OptionController@destroy')->name('options.delete');

    // Settings
    Route::get('settings', 'Admin\SettingsController@edit')->name('settings.edit');
    Route::patch('settings/update', 'Admin\SettingsController@update')->name('settings.update');


    // Users
    Route::resource('users', 'Admin\UserController');
    Route::get('users/{user}/delete', 'Admin\UserController@destroy')->name('users.delete');

    // Admins
    Route::resource('admins', 'Admin\AdminController');
    Route::get('admins/{admin}/delete', 'Admin\AdminController@destroy')->name('admins.delete');


    Route::resource('sliders', 'Admin\SliderController');
    Route::get('the_sliders/{category}', 'Admin\SliderController@index')->name('the_sliders.index');
    Route::get('the_sliders/main/{slider}', 'Admin\SliderController@main')->name('the_sliders.main');
    Route::get('sliders/{slider}', 'Admin\SliderController@destroy')->name('sliders.delete');

    Route::resource('coupons', 'Admin\CouponController');
    Route::get('coupons/{coupon}', 'Admin\CouponController@destroy')->name('coupons.delete');
    
    // vendor products
    Route::resource('vendor_products/{vendor}/the_vendor_products', 'Admin\VendorProductController');
    Route::get('vendor_products/{vendor}/the_vendor_products/{the_vendor_product}/delete', 'Admin\VendorProductController@destroy')->name('the_vendor_products.delete');

  
    Route::resource('vendor_sliders/{vendor}/the_vendor_sliders', 'Admin\VendorSliderController');
    Route::get('vendor_sliders/{vendor}/the_vendor_sliders/{the_vendor_slider}/delete', 'Admin\VendorSliderController@destroy')->name('the_vendor_sliders.delete');


    Route::resource('pages', 'Admin\PageController');
    Route::get('pages/{page}/delete', 'Admin\PageController@destroy')->name('pages.delete');

    Route::resource('the_vendors', 'Admin\VendorController')->only('index');

    Route::resource('orders', 'Admin\OrderController');
    Route::resource('returnings', 'Admin\ReturningsController');

    // Contact
    Route::resource('contacts', 'Admin\ContactController');

    Route::get('fetch_categories', 'Admin\FetchDataOutside@categories')->name('fetch_categories');
    Route::get('fetch_products', 'Admin\FetchDataOutside@products')->name('fetch_products');

    Route::resource('partners', 'Admin\PartnerController');
    Route::get('partners/{partner}', 'Admin\PartnerController@destroy')->name('partners.delete');

    Route::resource('cities', 'Admin\CityController');
    Route::get('cities/{city}', 'Admin\CityController@destroy')->name('cities.delete');
    
    Route::get('get_orders_no', 'Admin\OrderController@getOrdersNo');

});