<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getUserinfo($id)
    {
        $usInfo = User::where('id',$id)->first();
        return view('webclient.userinfo',['Usinfo'=>$usInfo]);
    }
}
