<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function getUserinfo($id)
    {
        $usInfo = User::where('id',$id)->first();
        return view('webclient.userinfo',['Usinfo'=>$usInfo]);
    }
    public function getUser()
    {
        $usInfo = User::all();
        return view('webadmin.member.member',['Users'=>$usInfo]);
    }
    function updateinfo(Request $request,$id)
    {

        $user = User::where('id',$id)->first();
        $user->user_gender = $request->user_gender;
        $user->user_address = $request->user_address;
        $user->user_phone = $request->user_phone;
        $user->user_id_card = $request->user_id_card;
        $user->save();
        return redirect()->back()->with('Thongbao','Bạn đã xóa thành công !');
    }
    public function getDeleteUser($id)
    {
        $user = User::where('id',$id);
        $user->delete();
        return redirect('/admin/dashboard/membermanager')->with('Thongbao','Bạn đã xóa thành công !');
    }
}
