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
    public function getUser()
    {
        $usInfo = User::all();
        return view('webadmin.member.member',['Users'=>$usInfo]);
    }
    function updateinfo(Request $request)
    {
//        $id = Auth::id();
//        $user = User::where('id','=',$id)->get()->first();
        $this->validate($request,
            [
                'user_gender' => 'required',
                'user_address' => 'required|min:10|max:100',
                'user_phone' => 'required|numeric|min:10',
                'user_id_card' => 'required|min:8|max:15',
            ],
            [
//                'user_genđer.regex' => 'Bạn cần nhập đúng giới tính !',
                'user_address.min' => 'Địa chỉ cần lớn hơn 10 và nhỏ hơn 100 kí tự !',
                'user_address.max' => 'Địa chỉ cần lớn hơn 10 và nhỏ hơn 100 kí tự !',
                'user_address.required' => 'Bạn chưa nhập địa chỉ !',
                'user_phone.min' => 'Số điện thoại cần lớn hơn 10 và nhỏ hơn 20 kí tự !',
                'user_phone.max' => 'Số điện thoại cần lớn hơn 10 và nhỏ hơn 20 kí tự !',
                'user_phone.required' => 'Bạn chưa nhập tên nhà xuất bản !',
                'user_phone.numeric' => 'Số điện thoại phải là chữ số !',
                'user_id_card.max' => 'Tên tên nhà xuất bản cần lớn hơn 8 và nhỏ hơn 15 kí tự !',
                'user_id_card.required' => 'Bạn chưa nhập chứng minh thư !',
                'user_id_card.min' => 'Chứng minh thư cần lớn hơn 8 và nhỏ hơn 15 kí tự !',
            ]);
        $user = Auth::user();
        $user->user_gender = $request->user_gender;
        $user->user_address = $request->user_address;
        $user->user_phone = $request->user_phone;
        $user->user_id_card = $request->user_id_card;
        $user->save();

        return redirect()->back()->with('thongbao','Cập nhật thành công');
    }
}
