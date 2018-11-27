<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public  function Logout()
    {
        Auth::logout();
    }
    public function GetLogin()
    {
        return view('webadmin.account.login');
    }
    public function check(Request $request)
    {
        $data = [
            'user_name' => $request->user_name,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            return redirect('/');
//            if(Auth::user()->role_id == 1)
//                return redirect(route('home'));
//            else
//                return redirect(route('dashboard'));
        } else {
            return redirect()->back()->with('status','  Tài khoản hoặc mật khẩu không chính xác');
        }
    }
}
