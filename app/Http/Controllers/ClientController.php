<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    function index()
    {
        return view('webclient.trangchu');
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
    function  loginadmin()
    {
        return view('webadmin.account.login');
    }
}
