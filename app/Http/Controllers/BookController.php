<?php

namespace App\Http\Controllers;
use App\bt_category;
use App\bt_comment;
use App\bt_rate;
use Dotenv\Validator;
use App\bt_type;
use App\bt_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;
use App\Http\Controllers\MLController as MLController;
class BookController extends Controller
{
    //admin
    public function getAddBook()
    {
        $type = bt_type::all();
        $category = bt_category::all();
        return view('webadmin.book.addbook',['Type'=>$type,'Category'=>$category]);
    }
    public function GetListBooks()
    {
        $books = bt_book::join('bt_types','bt_books.type_id','=','bt_types.type_id')->get();
        $bookimages = bt_book::join('bt_types','bt_books.type_id','=','bt_types.type_id')->orderBy('book_id','desc')->paginate(12);
        return view('webadmin.book.product',['books'=>$books,'bookimage'=>$bookimages]);
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
        return redirect('/admin/dashboard/bookmanager/addbook')->with('Thongbao','Thêm sản phẩm thành công ');
    }
    public function getUpdateBook($id)
    {
        $book = bt_book::where('book_id','=',$id)->get()->first();
        $type = bt_type::all();
        $category = bt_category::all();
        return view('webadmin.book.updatebook',['Book'=>$book,'Type'=>$type,'Category'=>$category]);
    }
    public function postUpdateBook(Request $request, $id)
    {
        $book = bt_book::where('book_id','=',$id)->get()->first();
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
        $book_name = $request->txtbook_name;
        $type_id = $request->sl_TL;
        $type = bt_type::where('type_id','=',$type_id)->first();
        $category_id = $type->category_id;
        $book_author = $request->txtbook_author;
        $book_publish = $request->txtbook_publish;
        $book_yearpublish = $request->slcbook_yearpublish;
        $book_provider = $request->txtbook_provider;
        $book_size = $request->slcbook_size;
        $book_jackettype = $request->txtbook_jackettype;
        $book_page = $request->txtbook_page;
        $book_image = $book->book_image;
        if($request->txtbook_quantity == '')
        {
            $book_quantity = 0;
        }
        else
        {
            $book_quantity = $request->txtbook_quantity;
        }
        $book_sale = $request->slcbook_sale;
        $book_price = $request->txtbook_price;
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
            if($book->book_image !='')
            {
                unlink("upload/book_image/".$book->book_image);
            }
            $book_image=$image;
        }
        $book_dsc = $request->txtbook_dsc;
        echo $book_image;
        $book::where('book_id','=',$id)->update([
            'book_name'=>$book_name,
            'type_id' => $type_id,
            'category_id'=> $category_id,
            'book_author' => $book_author,
            'book_publish' => $book_publish,
            'book_yearpublish' => $book_yearpublish,
            'book_provider' => $book_provider,
            'book_size' => $book_size,
            'book_jackettype' => $book_jackettype,
            'book_page' => $book_page,
            'book_quantity' => $book_quantity,
            'book_sale' => $book_sale,
            'book_price' => $book_price,
            'book_dsc' => $book_dsc,
            'book_image' => $book_image
        ]);
        if(!Cart::isEmpty())
        {
            $content = Cart::getContent();
            foreach ($content as $item)
            {
                if($item->id == $id)
                {
                    Cart::update($id, array(
                        'name'=>$book_name,
                        'price'=>($book_price - ($book_price*$book_sale)/100),
                        'attributes'=>array('img'=>$book_image,
                                        'sale'=>$book_sale)
                    ));
                }
            }
        }
        return redirect('/admin/dashboard/bookmanager')->with('Thongbao','Sửa sản phẩm thành công ! ');
    }
    public function getbookDetail($id)
    {
        $book = bt_book::where('book_id','=',$id)->get()->first();
        $type_id = $book->type_id;
        $type = bt_type::where('type_id','=',$type_id)->get()->first();
        return view('webadmin.book.bookdetail',["BookDetail"=>$book,'Type'=>$type]);
    }
    public function getDeletebook($id)
    {
        $book = bt_book::where('book_id','=',$id);
        $bookc = bt_book::where('book_id','=',$id)->first();
        if($bookc->book_image !='')
        {
            unlink("upload/book_image/".$bookc->book_image);
        }
        $book ->delete();
        Cart::remove($id);
        return redirect('admin/dashboard/bookmanager')->with('Thongbao','Bạn đã xóa thành công !');
    }
    //client
    public function getListBook()
    {
        $book =bt_book::all()->take(8);
        if($book->count() < 8 )
            $book = null;
        $LNewsbooks = bt_book::orderBy('book_id','desc')->take(15)->get();
        if($LNewsbooks->count() < 8)
            $LNewsbooks = null;
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        return view('webclient.index',['Books'=>$book,'LNewsBook'=>$LNewsbooks,'Rating'=>$rating]);
    }
    public function getLbookbyCategory($category_id)
    {
        $memberid = Auth::id();
        if($memberid != '')
        {
            $x = new MLController();
            $listRaw = $x->recomemded($memberid);
            $list = array();
            if($count  = count($list) > 3)
            {
                sort($listRaw);
                $list[] = $listRaw[0];
                $list[] = $listRaw[1];
                $list[] = $listRaw[2];
            }
            else
            {
                $list = $listRaw;
            }
        }
        else
        {
            $list = null;
        }

        $books = bt_book::where('category_id','=',$category_id)->paginate(9);
        $LbooksRecommend = bt_book::all();
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        $category_name = bt_category::where('category_id','=',$category_id)->select('category_name')->first();
        return view('webclient.productsbycategory',['Books'=>$books,'Category_name'=>$category_name,'Rating'=>$rating,"List"=>$list,"LBooksCm"=>$LbooksRecommend]);

    }
    public function getLbookbyType($type_id)
    {
        $books = bt_book::where('type_id','=',$type_id)->paginate(9);
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        $type_name = bt_type::where('type_id','=',$type_id)->select('type_name')->first();
        return view('webclient.productsbytype',['Books'=>$books,'Type_name'=>$type_name,'Rating'=>$rating]);
    }
    public function getBookinfo($book_id)
    {
        $cmts = bt_comment::join('users','bt_comments.member_id','=','users.id')->where('book_id','=',$book_id)->paginate(3);
        $books = bt_book::where('book_id','=',$book_id)->first();
        $category = bt_category::all();
        $types = bt_type::all();
        $memberid = Auth::id();
        $category_quantity = DB::table('bt_books')->select(DB::raw('category_id , COUNT(category_id) as quantity'))->groupBy('category_id')->get();
        $type_quantity = DB::table('bt_books')->select(DB::raw('type_id , COUNT(type_id) as quantity'))->groupBy('type_id')->get();
        $tb_rating = bt_rate::where('member_id','=',$memberid)->where('book_id','=',$book_id)->first();
        if($tb_rating != '')
            $rating = $tb_rating->book_rating;
        else
            $rating = 0;
        return view('webclient.single',['Book'=>$books,'Memberid'=>$memberid,'Comments'=>$cmts,'Rating'=>$rating,'Categorys'=>$category,'Types'=>$types,'Category_quantity'=>$category_quantity,'Type_quantity'=>$type_quantity]);
    }
}

