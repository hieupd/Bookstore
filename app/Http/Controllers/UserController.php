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
        return view('webclient.Index.Updateinfo',['Usinfo'=>$usInfo]);
    }
    public function getUser()
    {
        $usInfo = User::all();
        return view('webadmin.member.member',['Users'=>$usInfo]);
    }
    function updateinfo(Request $request,$id)
    {

        $user = User::where('id',$id)->first();
        $user->user_fname = $request->user_fname;
        $user->user_email = $request->user_email;
        $user->user_gender = $request->user_gender;
        $user->user_address = $request->user_address;
        $user->user_phone = $request->user_phone;
        if($request->password != "")
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('Thongbao','Bạn đã cập nhập thông tin thành công !');
    }
    public function getDeleteUser($id)
    {
        $user = User::where('id', $id)->first();
        if(Auth::user()->id != $user->id) {
            if (Auth::user()->role_id > $user->role_id) {
                $user->delete();
                return redirect('/admin/dashboard/membermanager')->with('Thongbao', 'Bạn đã xóa thành công !');
            } else
                return redirect('/admin/dashboard/membermanager')->with('Loi', 'Bạn chỉ có thể xóa người có quyền nhỏ hơn bạn !');
        }
        else
            return redirect('/admin/dashboard/membermanager')->with('Loi', 'Bạn không thể xóa bản thân !');
    }

}
