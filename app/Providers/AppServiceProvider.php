<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use App\bt_type;
use App\bt_category;
use Cart;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function Checkstr()
    {

    }
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('webclient.layout',function ($view)
        {
            $category = bt_category::all();
            $types = bt_type::all();
            $cart_Quantity = Cart::getTotalQuantity();
            $cart_total = Cart::getTotal();
            $authors = DB::table('bt_books')->select(DB::raw('book_author'))->groupBy('book_author')->get();
            $view -> with(['Types'=> $types,'Category'=> $category,'Cartquantity'=>$cart_Quantity,'Carttotal'=>$cart_total,'Authors'=>$authors]);



        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
