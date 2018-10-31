<?php

namespace App\Http\Controllers;

use App\bt_book;
use App\bt_category;
use App\bt_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    function index()
    {
        $book = bt_book::all()->take(8);
        if ($book->count() < 8)
            $book = null;
        $LNewsbooks = bt_book::orderBy('book_id', 'desc')->take(8)->get();
        if ($LNewsbooks->count() < 8)
            $LNewsbooks = null;
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        return view('webclient.index', ['Books' => $book, 'LNewsBook' => $LNewsbooks, 'Rating' => $rating]);
    }
    function products()
    {
        return view('webclient.products');
    }

    function checkout()
    {
        return view('webclient.checkout');
    }

    function login()
    {
        return view('webclient.login');
    }

    function register()
    {
        return view('webclient.register');
    }

    function single()
    {
        return view('webclient.single');
    }

    function mail()
    {
        return view('webclient.mail');
    }

    function loginadmin()
    {
        return view('webadmin.account.login');
    }

    function showinfo()
    {
        return view('webclient.userinfo');
    }

    function show()
    {
        return view('webclient.addproduct');
    }

    public function getAddBook()
    {
        $type = bt_type::all();
        $category = bt_category::all();
        return view('webclient.addproduct',['Type'=>$type,'Category'=>$category]);
    }
}
