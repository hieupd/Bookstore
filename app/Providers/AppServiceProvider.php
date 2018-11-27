<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use App\bt_type;
use App\bt_category;
use Cart;
use DB;
use Auth;

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
        view()->composer('webclient.layout.Header',function ($view)
        {
            if(Auth::check()) {
                $memberid = auth()->user()->id;
//            $id = Auth::user()->id;
                $category = bt_category::all();
                $types = bt_type::all();
                $cart_content = Cart::session($memberid)->getContent();
                $cart_Quantity = Cart::session($memberid)->getTotalQuantity();
                $cart_total = Cart::session($memberid)->getTotal();
                $authors = DB::table('bt_books')->select(DB::raw('book_author'))->groupBy('book_author')->get();
                $view->with(['Types' => $types, 'Category' => $category, 'Cartquantity' => $cart_Quantity, 'Carttotal' => $cart_total, 'Authors' => $authors, 'CartContent' => $cart_content]);
            }
            else
            {
                $category = bt_category::all();
                $types = bt_type::all();
                $authors = DB::table('bt_books')->select(DB::raw('book_author'))->groupBy('book_author')->get();
                $view->with(['Types' => $types, 'Category' => $category, 'Authors' => $authors]);
            }
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
