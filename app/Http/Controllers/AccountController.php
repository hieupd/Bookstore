<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $user = User::where('id',$id)->first();
        if(Auth::user()->id != $user->id) {
            if (Auth::user()->role_id > $user->role_id) {
                $user->delete();
                return redirect('/admin/dashboard/accountmanager')->with('Thongbao', 'Bạn đã xóa thành công !');
            } else
                return redirect('/admin/dashboard/accountmanager')->with('Loi', 'Bạn chỉ có thể xóa người có quyền nhỏ hơn bạn !');
        }
        else
            return redirect('/admin/dashboard/accountmanager')->with('Loi', 'Bạn không thể xóa bản thân !');

    }
    public function postUpdateAccount($id)
    {
        if(Request::ajax())
        {
            $role = Request::get('role_id');
            $roles = bt_role::where('role_id',$role)->select('role_name')->first();
            $user = User::where('id','=',$id)->first();
            if(Auth::user()->id != $user->id) {
                if (Auth::user()->role_id > $user->role_id) {
                    if (Auth::user()->role_id > $role) {
                        $user::where('id', '=', $id)->update([
                            'role_id' => $role,
                        ]);
                        return $roles->role_name;
                    } else
                        return "Error1";
                } else
                    return "Error2";
            }
            else
                return "Error3";
        }
    }
}
