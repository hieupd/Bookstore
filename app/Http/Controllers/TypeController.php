<?php

namespace App\Http\Controllers;
use App\bt_book;
use App\bt_category;
use App\bt_type;
use Dotenv\Validator;
use Illuminate\Http\Request;

class TypeController extends Controller
{
   // book_list
    public function getListType()
    {
        $category = bt_category::all();
        $Types = bt_type::join('bt_categorys','bt_categorys.category_id','=','bt_types.category_id')->get();;
        return view('webadmin.type.category',['Category'=>$category,'Types'=>$Types]);
    }
    public function getDeletebooklist($id)
    {
        $category = bt_category::where('category_id','=',$id);
        $Type = bt_type::where('category_id','=',$id);
        $books = bt_book::where('category_id','=',$id);
        $books->delete();
        $Type -> delete();
        $category->delete();
        return redirect('/admin/dashboard/typemanager')->with('Thongbao','Bạn đã xóa danh mục thành công !');
    }
    public function postBooklist(Request $request)
    {
        $this->validate($request,
            [
                'txtlist_name' => 'required|min:2|max:50',
            ],
            [
                'txtlist_name.required' => 'Bạn chưa nhập tên danh mục !',
                'txtlist_name.min' => 'Tên danh mục cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
                'txtlist_name.max' => 'Tên danh mục cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
            ]);
        $category = new bt_category();
        $category -> category_name = $request->txtlist_name;
        $category -> save();
        return redirect('/admin/dashboard/addbooktype')->with('Thongbao','Thêm danh mục thành công ');
        echo $request->txttype_name;
    }
    public function postUpdatebooklist(Request $request , $id)
    {
        $this->validate($request,
            [
                'txt_listname' => 'required|min:2|max:50',
            ],
            [
                'txt_listname.required' => 'Bạn chưa nhập tên danh mục !',
                'txt_listname.min' => 'Tên danh mục cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
                'txt_listname.max' => 'Tên danh mục cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
            ]);
        $name = $request->txt_listname;
        $List = bt_category::where('category_id','=',$id)->update(['category_name'=>$name]);
        return redirect('/admin/dashboard/typemanager')->with('Thongbao','Sửa danh mục thành công ');
    }
    // book_ type
    public function getAddbooktype()
    {
        $category = bt_category::all();
        return view('webadmin.type.addbooktype',['Category'=>$category]);
    }
    public function postBooktype(Request $request)
    {
       $this->validate($request,
           [
               'txttype_name' => 'required|min:2|max:50',
           ],
           [
               'txttype_name.required' => 'Bạn chưa nhập tên thể loại !',
               'txttype_name.min' => 'Tên thể loại cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
               'txttype_name.max' => 'Tên thể loại cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
           ]);
       $Type = new bt_type();
       $Type->type_name = $request->txttype_name;
       $Type->category_id = $request->slc_categoryname;
       $Type->Save();
       return redirect('/admin/dashboard/addbooktype')->with('Thongbao','Thêm thể lọai thành công ');

    }
    public function postUpdatebooktype(Request $request, $id)
    {   $Type = bt_type::where('type_id','=',$id)->get()->first();
        $this->validate($request,
            [
                'txt_typename' => 'required|min:2|max:50',
            ],
            [
                'txt_typename.required' => 'Bạn chưa nhập tên thể loại !',
                'txt_typename.min' => 'Tên thể loại cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
                'txt_typename.max' => 'Tên thể loại cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
            ]);

        $name = $request->txt_typename;
        $category = $request->slc_listname;
        $Type::where('type_id','=',$id)->update(['type_name'=>$name,'category_id'=>$category]);
        return redirect('/admin/dashboard/typemanager')->with('Thongbao','Sửa thành công ');

    }
    public function getDeletebooktype($type_id)
    {
        $type = bt_type::where('type_id','=',$type_id);
        $books = bt_book::where('type_id','=',$type_id);
        $books->delete();
        $type->delete();
        return redirect('/admin/dashboard/typemanager')->with('Thongbao','Bạn đã xóa thành công !');
    }

}
