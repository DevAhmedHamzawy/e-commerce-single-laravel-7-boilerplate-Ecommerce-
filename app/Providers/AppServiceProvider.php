<?php

namespace App\Providers;

use App\Category;
use App\Page;
use App\Partner;
use App\Settings;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories', Category::whereCategoryId(Null)->take(5)->get());
        view()->share('allCategories', Category::whereCategoryId(Null)->get());
        view()->share('settings', Settings::findOrFail(1));
        view()->share('pages', Page::all());
        view()->share('partners', Partner::all());

        view()->composer('*', function ($view) 
        {
            $view->with('locale', \Session::get('locale') );    
        });  
    }
}
