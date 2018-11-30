<?php

namespace App\Http\Controllers;
use App\bt_billinfo;
use App\bt_category;
use App\bt_comment;
use App\bt_rate;
use App\bt_slide;
use Dotenv\Validator;
use App\bt_type;
use App\bt_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;
use App\Http\Controllers\Recommend as MLController;
use Filter;

class BookController extends Controller
{
    //admin
    public function getAddBook()
    {
        $type = bt_type::all();
        $category = bt_category::all();
        $var = ['Type'=>$type,'Category'=>$category];
        return view('webadmin.book.addbook')->with($var);
    }
    public function GetListBooks()
    {
        $books = bt_book::join('bt_types','bt_books.type_id','=','bt_types.type_id')->where('book_status',1)->get();
        $bookimages = bt_book::join('bt_types','bt_books.type_id','=','bt_types.type_id')->orderBy('book_id','desc')->paginate(12);
        $var = ['books'=>$books,'bookimage'=>$bookimages];
        return view('webadmin.book.product')->with($var);
    }
    public function GetListNonacceptBooks()
    {
        $books = bt_book::join('bt_types','bt_books.type_id','=','bt_types.type_id')->where('book_status',0)->get();
        $var = ['books'=>$books];
        return view('webadmin.book.nonacceptproduct')->with($var);
    }
    public function postAddBook(Request $request)
    {
        $this->validate($request,
            [
                'txtbook_name' => 'required|min:2|max:50',
                'txtbook_author' => 'required|min:4|max:50',
                'txtbook_publish' => 'required|min:4|max:50',
                'txtbook_provider' => 'required|min:4|max:50',
                'txtbook_page' => 'required|integer|min:0',
                'txtbook_quantity' => 'integer|min:0',
                'txtbook_price' => 'required|integer|min:0',
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
                'txtbook_page.min' => 'Sô trang sách không âm !',
                'txtbook_quantity.integer' => 'Sô lượng sách chỉ được nhập số !',
                'txtbook_quantity.min' => 'Sô lượng sách không được âm !',
                'txtbook_price.required' => 'Bạn chưa nhập số đơn giá!',
                'txtbook_price.integer' => 'Đơn giá chỉ được nhập số !',
                'txtbook_price.min' => 'Đơn giá không âm !',
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
        $book->book_tprice = $request->txtbook_price - ($request->txtbook_price * $request->slcbook_sale /100 );
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
        $book->book_status = 1;
        $book->save();
        return redirect('/admin/dashboard/bookmanager/addbook')->with('Thongbao','Thêm sản phẩm thành công ');
    }
    public function getUpdateBook($id)
    {
        $book = bt_book::where('book_id','=',$id)->where('book_status',1)->get()->first();
        $type = bt_type::all();
        $category = bt_category::all();
        $var = ['Book'=>$book,'Type'=>$type,'Category'=>$category];
        return view('webadmin.book.updatebook')->with($var);
    }
    public function updatef()
    {
        $book = bt_book::all();
        foreach ($book as $item)
        {
            $x = $item->book_price - ($item->book_price * $item->book_sale/100);
            echo $x;
            echo "<br>";
            $item->book_tprice = $x;
            $item->save();
        }
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
                'txtbook_page' => 'required|integer|min:0',
                'txtbook_quantity' => 'integer|min:0',
                'txtbook_price' => 'required|integer|min:0',
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
                'txtbook_page.min' => 'Sô trang sách không âm !',
                'txtbook_quantity.integer' => 'Sô lượng sách chỉ được nhập số !',
                'txtbook_quantity.min' => 'Sô lượng sách không được âm !',
                'txtbook_price.required' => 'Bạn chưa nhập số đơn giá!',
                'txtbook_price.integer' => 'Đơn giá chỉ được nhập số !',
                'txtbook_price.min' => 'Đơn giá không âm !',
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
        $book_tprice = $request->txtbook_price - ($request->txtbook_price * $request->slcbook_sale /100 );
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
            'book_image' => $book_image,
            'book_tprice' => $book_tprice,
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
        return redirect()->back()->with('Thongbao','Bạn đã xóa thành công !');
    }
    public function getbookDetail($id)
    {
        $book = bt_book::where('book_id','=',$id)->get()->first();
        $type_id = $book->type_id;
        $type = bt_type::where('type_id','=',$type_id)->get()->first();
        $var = ["BookDetail"=>$book,'Type'=>$type];
        return view('webadmin.book.bookdetail')->with($var);
    }

    //client
    public function getListBook()
    {
        $Lslide = bt_slide::where('slide_status',1)->get();
        $book =bt_book::where('book_status',1)->orderby('book_id','desc')->take(10)->get();
//        join('bt_books','bt_books.book_id','=','bt_billinfos.book_id')
        $topBooksale = DB::table('bt_billsinfo')
            ->join('bt_books','bt_books.book_id','=','bt_billsinfo.book_id')
            ->select(DB::raw('bt_billsinfo.book_id,bt_books.book_name,bt_books.book_image,bt_books.book_sale,bt_books.book_price,bt_books.book_quantity,SUM(bt_billsinfo.book_quantity) as sum'))
            ->orderBy('sum','desc')->groupBy('bt_billsinfo.book_id','bt_books.book_name','bt_books.book_image','bt_books.book_sale','bt_books.book_price','bt_books.book_quantity')
            ->take(6)->get();
        $memberid = Auth::id();;
        if ($memberid != '') {
            $x = new Recommend();
            $list = $x->recomemded($memberid,'bt_rates','member_id','book_id','book_rating');
            if(count($list) == 0)
                $list = null;
            $bookRecomend = bt_book::where('book_id',$list[0])->get();
            if(count($list) > 1)
            {
                for($i = 1 ; $i < count($list);$i++)
                {
                    $booktmp = bt_book::where('book_id',$list[$i])->first();
                    $bookRecomend->push($booktmp);
                }
            }
        } else {
            $bookRecomend = null;
        }
        $category = bt_category::all()->take(9);
        $type = bt_type::all();
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        $var = ['Lslide'=> $Lslide,'Books'=>$book,'topSale'=>$topBooksale,'Rating'=>$rating,'Categorys'=>$category,'Types'=>$type,'LbookRecomend'=>$bookRecomend];
        return view('webclient.Index.Index')->with($var);
    }
    public function getLbookbyCategory($category_id,Request $request)
    {
        $ListCategory = bt_category::all()->take(9);
        $ListType = bt_type::all();
        $category = bt_category::where('category_id',$category_id)->first();
        if($category != null) {
            $from = $request->get('from','0');
            $to = $request->get('to','500000');
            $bookraw = bt_book::where('category_id', $category_id)->where('book_status', 1);
            if ($request->get('order') == 'price') {
                $bookraw->orderBy('book_tprice', $request->get('sort', 'asc'));
                $sort = $request->get('sort', 'asc');
                $Order = "price";
            }
            else if ($request->get('order') == 'name') {
                $bookraw ->orderby('book_name', $request->get('sort', 'asc'));
                $sort = $request->get('sort', 'asc');
                $Order = "name";
            } else {
                $sort = $request->get('sort', 'asc');
                $Order = "";
            }
            if($from > 0 || $to < 500000)
            {
                $bookraw->where('book_tprice','>',$from)->where('book_tprice','<',$to);
            }
            $books = $bookraw->paginate(12)->appends(['order'=>$Order,'sort'=>$sort,'from'=>$from,'to'=>$to]);
            $LbooksRecommend = bt_book::all();
            $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
            $category_name = bt_category::where('category_id', '=', $category_id)->first();
            $var = ['ListType'=>$ListType,'ListCategory'=>$ListCategory,'Books' => $books, 'Category_name' => $category_name, 'Rating' => $rating, "LBooksCm" => $LbooksRecommend, "Order" => $Order,'From'=>$from,'To'=>$to];
            return view('webclient.Category.Category')->with($var);
        }
        return view('webclient.Option.404');
    }
    public function getLbookbyType($type_id, Request $request)
    {
        $ListCategory = bt_category::all()->take(9);
        $ListType = bt_type::all();
        $type = bt_type::where('type_id',$type_id)->first();
        if($type != null)
        {
            $from = $request->get('from','0');
            $to = $request->get('to','500000');
            $bookraw = bt_book::where('type_id', $type_id)->where('book_status', 1);
            if ($request->get('order') == 'price') {
                $bookraw->orderBy('book_tprice', $request->get('sort', 'asc'));
                $sort = $request->get('sort', 'asc');
                $Order = "price";

            } else if ($request->get('order') == 'name') {
                $bookraw ->orderby('book_name', $request->get('sort', 'asc'));
                $sort = $request->get('sort', 'asc');
                $Order = "name";
            } else {
                $sort = $request->get('sort', 'asc');
                $Order = "";
            }
            if($from > 0 || $to < 500000)
            {
                $bookraw->where('book_tprice','>',$from)->where('book_tprice','<',$to);
            }
            $books = $bookraw->paginate(12)->appends(['order'=>$Order,'sort'=>$sort,'from'=>$from,'to'=>$to]);
            $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
            $type_name = bt_type::where('type_id', '=', $type_id)->first();
            $var =['ListType'=>$ListType,'ListCategory'=>$ListCategory,'Books' => $books, 'Type_name' => $type_name, 'Rating' => $rating, "Order" => $Order,'From'=>$from,'To'=>$to];
            return view('webclient.Category.Type')->with($var);
        }
        else
        return view('webclient.Option.404');
    }
    public function getBookinfo($book_id)
    {

        $books = bt_book::where('book_id','=',$book_id)->where('book_status',1)->first();
        if($books != null) {
            $cmts = bt_comment::join('users', 'bt_comments.member_id', '=', 'users.id')->where('book_id', '=', $book_id)->get();
//        $category = bt_category::all();
//        $types = bt_type::all();
            $memberid = Auth::id();;
            if ($memberid != '') {
                $x = new Recommend();
                $listRaw = $x->recomemded($memberid,'bt_rates','member_id','book_id','book_rating');
                $list = array();
                $list = $listRaw;
            } else {
                $list = null;
            }
            $LbooksRecommend = bt_book::all();
            $related_book = bt_book::where('type_id', $books->type_id)->take(4)->get();
//        $category_quantity = DB::table('bt_books')->select(DB::raw('category_id , COUNT(category_id) as quantity'))->groupBy('category_id')->get();
//        $type_quantity = DB::table('bt_books')->select(DB::raw('type_id , COUNT(type_id) as quantity'))->groupBy('type_id')->get();
            $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
            $tb_rating = bt_rate::where('member_id', '=', $memberid)->where('book_id', '=', $book_id)->first();
            if ($tb_rating != '')
                $book_rating = $tb_rating->book_rating;
            else
                $book_rating = 0;
            $var = ["LBooksCm" => $LbooksRecommend, 'List_recomend' => $list, 'Book' => $books, 'Memberid' => $memberid, 'Comments' => $cmts, 'bookRating' => $book_rating, 'Rating' => $rating, 'Book_related' => $related_book];
            return view('webclient.Product.Product-configurable')->with($var);
        }
        else
            return view('webclient.Option.404');
    }
    public function getUploadbook()
    {
        $type = bt_type::all();
        $category = bt_category::all();
        return view('webclient.Product.Uploadbook',['Type'=>$type,'Category'=>$category]);
    }
    public function postAddBookFU(Request $request)
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
        $book->book_status = 0;
        $book->save();
        return redirect()->back()->with('Thongbao','Thêm sản phẩm thành công vui lòng chờ sản phẩm được duyệt ! ');
    }
    public function SearchBook(Request $request,$keywords)
    {
        $ListCategory = bt_category::all()->take(9);
        $ListType = bt_type::all();
        $keyword = str_replace('%',' ',$keywords);
//        $keyword = $keywords;
        $from = $request->get('from','0');
        $to = $request->get('to','500000');
        $bookraw = bt_book::where('book_tprice','>',$from)
            ->where('book_tprice','<',$to)
            ->where('book_name','like','%'.$keyword.'%')
            ->orWhere('book_author','like','%'.$keyword.'%')
            ->orWhere('book_publish','like','%'.$keyword.'%')
            ->orWhere('book_provider','like','%'.$keyword.'%')
            ->orWhere('book_price',$keyword);
        $count = $bookraw->count();
        if ($request->get('order') == 'price') {
            $bookraw->orderBy('book_tprice', $request->get('sort', 'asc'));
            $sort = $request->get('sort', 'asc');
            $Order = "price";

        } else if ($request->get('order') == 'name') {
            $bookraw ->orderby('book_name', $request->get('sort', 'asc'));
            $sort = $request->get('sort', 'asc');
            $Order = "name";
        } else {
            $sort = $request->get('sort', 'asc');
            $Order = "";
        }

        $books = $bookraw->paginate(12)->appends(['order'=>$Order,'sort'=>$sort,'from'=>$from,'to'=>$to]);
        $keyword = str_replace(' ','%',$keywords);
        $rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        $result =['ListCategory'=>$ListCategory,'Books' => $books, 'Keyword' => $keyword, 'Rating' => $rating, "Order" => $Order,'From'=>$from,'To'=>$to,'Count'=>$count];
        return view('webclient.Category.SearchResultPage')->with($result);
    }
}

