<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Product;
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
        view()->composer('index', function($view){
            $products = Product::latest()->limit(8)->get();
            $view->with('products', $products);

            $brands = Brand::all();
            $view->with('brands', $brands);

        }); 

        view()->composer('inc.nav', function($view){
            $categories = Category::with('children')->whereNull('parent_id')->orderBy('name', 'asc')->get();      
            // $categories = Category::with('children')->orderBy('name', 'asc')->get();
            $brands = Brand::all();
            $view->with(compact('categories', 'brands'));    
        });

        view()->composer('auth.register', function($view){
            $cities = City::with('districts')->get();
            $districts = District::all();
            $view->with(compact('districts', 'cities'));

        }); 

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
