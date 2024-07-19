<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Favorite;
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
            $favorite = Favorite::where('customer_id',auth('customers')->id())->get();
            $view->with(compact('carts','favorite'));
        });

        view()->composer('Fe.layout.master', function($view) {
            // Lấy tất cả các danh mục cha và con
            $categories = Category::whereNull('parent_id')->with('children')->get();
            $view->with(compact('categories'));
        });
        view()->composer('*', function($view) {
            // Lấy tất cả các danh mục cha và con
            $products = Product::inRandomOrder()->get();
            $pro = Product::inRandomOrder()->first();
            $view->with(compact('products','pro'));
        });
    }
}
