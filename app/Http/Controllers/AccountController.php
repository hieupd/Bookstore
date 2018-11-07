<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\bt_role;
class AccountController extends Controller
{
    public function getAccount()
    {
        $Roles = bt_role::all();
        $Account = User::join('bt_roles','bt_roles.role_id','=','users.role_id')->get();
        return view('webadmin.account.account',['Accounts'=>$Account,'Roles'=>$Roles]);
    }
    public function getDeleteAccount($id)
    {
        $user = User::where('id',$id);
        $user->delete();
        return redirect('/admin/dashboard/accountmanager')->with('Thongbao','Bạn đã xóa thành công !');
    }
    public function postUpdateAccount($id)
    {
        if(Request::ajax())
        {
            $role = Request::get('role_id');
            $user = User::where('id','=',$id)->first();
            $user::where('id','=',$id)->update([
                'role_id' => $role,
            ]);
            return "Success";
        }
    }
}
