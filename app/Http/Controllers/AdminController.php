<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Request\LoginRequest;

class AdminController extends Controller
{
    function index()
    {
        return view('webadmin.index');
    }
    function getMemberMNG()
    {
        return view('webadmin.member.member');
    }
    function getBookMNG()
    {
        return view('webadmin.book.product');
    }
    function getTypeMNG()
    {
        return view('webadmin.type.list');
    }
    function getBillMNG()
    {
        return view('webadmin.bill.bill');
    }
    function getViewMNG()
    {
        return view('webadmin.bill.thongke');
    }


}
