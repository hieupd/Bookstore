<?php

namespace App\Http\Controllers;

use App\bt_book;
use App\bt_category;
use App\bt_type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    function index()
    {
        $book = bt_book::all()->take(8);
        if ($book->count() < 8)
            $book = null;
        $LNewsbooks = bt_book::orderBy('book_id', 'desc')->take(8)->get();
        if ($LNewsbooks->count() < 8)
            $LNewsbooks = null;
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        return view('webclient.index', ['Books' => $book, 'LNewsBook' => $LNewsbooks, 'Rating' => $rating]);
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

    function loginadmin()
    {
        return view('webadmin.account.login');
    }

    function showinfo()
    {
        return view('webclient.userinfo');
    }

    function show()
    {
        return view('webclient.addproduct');
    }

    public function getAddBook()
    {
        $type = bt_type::all();
        $category = bt_category::all();
        return view('webclient.addproduct',['Type'=>$type,'Category'=>$category]);
    }
    public function postAddBook(Request $request)
    {
        $this->validate($request,
            [
                'txtbook_name' => 'required|min:2|max:50',
                'txtbook_author' => 'required|min:4|max:50',
                'txtbook_publish' => 'required|min:4|max:50',
                'txtbook_provider' => 'required|min:4|max:50',
                'txtbook_page' => 'required|integer',
                'txtbook_quantity' => 'integer',
                'txtbook_price' => 'required|integer',
                'sl_CL'=>'required',
                'sl_TL'=>'required',
            ],
            [
                'txtbook_name.required' => 'Bạn chưa nhập tên sách !',
                'txtbook_name.min' => 'Tên sách cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
                'txtbook_name.max' => 'Tên sách cần lớn hơn 1 và nhỏ hơn 50 kí tự !',
                'txtbook_author.required' => 'Bạn chưa nhập tên tác giả !',
                'txtbook_author.min' => 'Tên tác giả cần lớn hơn 4 và nhỏ hơn 50 kí tự !',
                'txtbook_author.max' => 'Tên tác giả cần lớn hơn 4 và nhỏ hơn 50 kí tự !',
                'txtbook_publish.required' => 'Bạn chưa nhập tên nhà xuất bản !',
                'txtbook_publish.min' => 'Tên tên nhà xuất bản cần lớn hơn 4 và nhỏ hơn 50 kí tự !',
                'txtbook_publish.max' => 'Tên tên nhà xuất bản cần lớn hơn 4 và nhỏ hơn 50 kí tự !',
                'txtbook_provider.required' => 'Bạn chưa nhập tên nhà xuất bản !',
                'txtbook_provider.min' => 'Tên tên nhà xuất bản cần lớn hơn 4 và nhỏ hơn 50 kí tự !',
                'txtbook_provider.max' => 'Tên tên nhà xuất bản cần lớn hơn 4 và nhỏ hơn 50 kí tự !',
                'txtbook_page.required' => 'Bạn chưa nhập số trang sách !',
                'txtbook_page.integer' => 'Sô trang sách chỉ được nhập số !',
                'txtbook_quantity.integer' => 'Sô lượng sách chỉ được nhập số !',
                'txtbook_price.required' => 'Bạn chưa nhập số đơn giá!',
                'txtbook_price.integer' => 'Đơn giá chỉ được nhập số !',
                'sl_CL.required'=>'Vui lòng chọn danh mục !',
                'sl_TL.required'=>'Vui lòng chọn thể loại !',


            ]);
        $book = new bt_book;
        $type = bt_type::where('type_id','=',$request->sl_TL)->first();
        $category_id = $type->category_id;
        $book->book_name = $request->txtbook_name;
        $book->type_id = $request->sl_TL;
        $book->category_id = $category_id;
        $book->book_author = $request->txtbook_author;
        $book->book_publish = $request->txtbook_publish;
        $book->book_yearpublish = $request->slcbook_yearpublish;
        $book->book_provider = $request->txtbook_provider;
        $book->book_size = $request->slcbook_size;
        $book->book_jackettype = $request->txtbook_jackettype;
        $book->book_page = $request->txtbook_page;
        if($request->txtbook_quantity == '')
        {
            $book->book_quantity = 0;
        }
        else
        {
            $book->book_quantity = $request->txtbook_quantity;
        }
        $book->book_sale = $request->slcbook_sale;
        $book->book_price = $request->txtbook_price;
        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/book_image/".$image))
            {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/book_image",$image);
            $book->book_image=$image;
        }
        else
        {
            $book->book_image = $request->Image;
        }
        $book->book_dsc = $request->txtbook_dsc;
        $book->save();
        return redirect()->back()->with('Thongbao','Thêm sản phẩm thành công ');
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
