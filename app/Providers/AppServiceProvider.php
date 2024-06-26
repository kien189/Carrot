<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*',function($view){
            $carts = Cart::where('customer_id',auth('customers')->id())->get();
            $view->with(compact('carts'));
        });

       view()->composer('*',function($view){
        $cates= Category::orderBy('id','asc')->get();
        $view->with(compact('cates'));
       });
    }
}
