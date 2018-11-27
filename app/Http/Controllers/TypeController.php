<?php

namespace App\Http\Controllers;
use App\bt_book;
use App\bt_category;
use App\bt_type;
use Dotenv\Validator;
use DB;
use Illuminate\Http\Request;

class TypeController extends Controller
{
   // book_list

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
    public function getListShowBookByType($sortby,$id,$quantity)
    {
        if($sortby == 'price')
        {
            //$Books = bt_book::where('category_id',$id)->orderBy('book_price','asc')->paginate($quantity);
            $Books = DB::table('bt_books')->select(DB::raw('*,(book_price-(book_sale * book_price)/100) as book_tprice'))->where('type_id',$id)->orderBy('book_tprice','asc')->paginate($quantity);
        }
        else if($sortby == 'name')
        {
            $Books = bt_book::where('type_id',$id)->orderby('book_name','asc')->paginate($quantity);
        }
        else
        {
            $Books = bt_book::where('type_id',$id)->orderby('book_id','asc')->paginate($quantity);
        }
        $Rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
        foreach($Books as $book)
        {
            echo "
                 <li class=\"item\">
                     <div class=\"product-item\">
                         <div class=\"product-shop-top\">
                                ";

            if($book->book_sale > 0)
            {
                echo "
                                <ul class=\"productlabels_icons\">
                                   <li class=\"label special\">
                                   <p><span>".$book->book_sale."%</span> </p>
                                   </li>
                                </ul>
              ";
            }
            echo "
                <a href=\"product-detail.html\" title=\"WIASSI Version 12\" class=\"product-image\">
                    <img class=\"em-img-lazy img-responsive em-alt-hover\" src=\"/upload/book_image/".$book->book_image."\" width=\"220\" height=\"220\" alt=\"WIASSI Version 12\" /> <img id=\"product-collection-image-217\" class=\"em-img-lazy img-responsive em-alt-org\" src=\"/upload/book_image/".$book->book_image."\" width=\"220\" height=\"220\" alt=\"WIASSI Version 12\" />
                    <span class=\"bkg-hover\"></span>
                </a>
                <div class=\"bottom\">
                    <div class=\"em-btn-addto text-center \">
                          <button type=\"button\" title=\"Add to Cart\" class=\"button btn-cart\" onclick=\"217\"><span><span>Thêm vào giỏ</span></span>
                          </button>
                          <ul class=\"add-to-links\">
                             <li><a href=\"#217\" class=\"link-wishlist\" title=\"Add to Wishlist\">Add to Wishlist</a>
                             </li>
                          </ul>
                    </div>
                    <div class=\"quickshop-link-container\"> <a href=\"/Product/singleproduct/".$book->book_id."\" class=\"quickshop-link\" title=\"Quickshop\">Quickshop</a>
                    </div>
                </div>
              </div>
              <div class=\"product-shop\">
                <div class=\"f-fix\">
                   <h2 class=\"product-name text-center  \"><a href=\"product-detail.html\" title=\"WIASSI Version 12\"> ".$book->book_name." </a></h2>
                      <div class=\" text-center\">
                          <div class=\"ratings\">
                             <div class=\"rating-box\">
            ";
            foreach($Rating as $rate)
            {
                if($rate->book_id == $book->book_id)
                {
                    echo "<div class=\"rating\" style=\"width:".($rate->rating/5*100)."%\"></div>";
                }
            }
            echo "
            </div> <span class=\"amount\"><a href=\"#\" onclick=\"217\"></a></span>
                                                            </div>
                                                        </div>
                                                        <div class=\"text-center \">
                                                            <div class=\"price-box\"> <span class=\"regular-price\" id=\"product-price-217\"> <span class=\"price\"  content=\"1200\">".number_format(($book->book_price - ($book->book_price * $book->book_sale)/100),0,',','.')." đ</span> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-item -->
                                        </li>
            ";

        }
    }
}
