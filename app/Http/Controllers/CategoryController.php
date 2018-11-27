<?php

namespace App\Http\Controllers;

use App\bt_book;
use Illuminate\Http\Request;
use App\bt_category;
use DB;
use Mockery\Exception;
use App\bt_type;
require "simple_html_dom.php";
class CategoryController extends Controller
{
       public function getListType()
    {
        $category = bt_category::all();
        $Types = bt_type::join('bt_categorys','bt_categorys.category_id','=','bt_types.category_id')->get();;
        return view('webadmin.type.category',['Category'=>$category,'Types'=>$Types]);
    }

    public function getDeletebookCategory($id)
    {
        $category = bt_category::where('category_id','=',$id);
        $Type = bt_type::where('category_id','=',$id);
        $books = bt_book::where('category_id','=',$id);
        $books->delete();
        $Type -> delete();
        $category->delete();
        return redirect('/admin/dashboard/typemanager')->with('Thongbao','Bạn đã xóa danh mục thành công !');
    }
    public function postUpdatebookCategory(Request $request , $id)
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
    public function postCategoryList(Request $request)
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
    }
    public function getCate()
    {
        set_time_limit(1000);
        $html = file_get_html("https://www.vinabook.com");
//        echo $html;
//        echo "<br>";
        $menu = $html->find('li.level-0');
        $x = array();
        $i = 0;
        foreach ($menu as $item) {
            if($i > 2) {
                $category_name = $item->find('a', 0)->title;
//            echo $category_name;
                $link = $item->find('a', 0)->href;
                $str = "https://www.vinabook.com";
                if (strpos($link, $str) === false) {
                    $link = $str . $link;
                }
                $category = new bt_category();
                $category->category_name = $category_name;
                $category->save();
                $category_id = bt_category::select(DB::raw('max(category_id) as id'))->first();
                $html2 = file_get_html("$link");
                $menu2 = $html2->find('div.box-widget-categories ul li a');
                foreach ($menu2 as $item2) {
                    $type_name = $item2->title;
//                echo $type_name;
                    $type = new bt_type();
                    $type->type_name = $type_name;
                    $type->category_id = $category_id->id;
                    $type->save();
                }
            }
            $i++;
        }
    }
//    public function getListShowBookByCategory($sortby,$id,$quantity,Request $request)
//    {
//        if($sortby == 'price')
//        {
//            //$Books = bt_book::where('category_id',$id)->orderBy('book_price','asc')->paginate($quantity);
//            $Books =  $books = DB::table('bt_books')->select(DB::raw('*,(book_price-(book_sale * book_price)/100) as book_tprice'))->where('category_id',$id)->orderBy('book_tprice',$request->get('sort','desc'))->paginate(4);
//        }
//        else if($sortby == 'name')
//        {
//            $Books = bt_book::where('category_id',$id)->orderby('book_name','desc')->paginate($quantity);
//        }
//        else
//        {
//            $Books = bt_book::where('category_id',$id)->orderby('book_id','desc')->paginate($quantity);
//        }
//        $Rating = DB::table('bt_rates')->select(DB::raw('book_id,AVG(book_rating) as rating'))->groupBy('book_id')->get();
//        foreach($Books as $book)
//        {
//            echo " <ul class=\"emcatalog-grid-mode products-grid emcatalog-disable-hover-below-mobile\">";
//            echo "
//
//                 <li class=\"item\">
//                     <div class=\"product-item\">
//                         <div class=\"product-shop-top\">
//                               ";
//
//            if($book->book_sale > 0)
//            {
//              echo "
//                                <ul class=\"productlabels_icons\">
//                                   <li class=\"label special\">
//                                   <p><span>".$book->book_sale."%</span> </p>
//                                   </li>
//                                </ul>
//              ";
//            }
//            echo "
//                <a href=\"product-detail.html\" title=\"WIASSI Version 12\" class=\"product-image\">
//                    <img class=\"em-img-lazy img-responsive em-alt-hover\" src=\"/upload/book_image/".$book->book_image."\" width=\"220\" height=\"220\" alt=\"WIASSI Version 12\" /> <img id=\"product-collection-image-217\" class=\"em-img-lazy img-responsive em-alt-org\" src=\"/upload/book_image/".$book->book_image."\" width=\"220\" height=\"220\" alt=\"WIASSI Version 12\" />
//                    <span class=\"bkg-hover\"></span>
//                </a>
//                <div class=\"bottom\">
//                    <div class=\"em-btn-addto text-center \">
//                          <button type=\"button\" title=\"Add to Cart\" class=\"button btn-cart\" onclick=\"217\"><span><span>Thêm vào giỏ</span></span>
//                          </button>
//                          <ul class=\"add-to-links\">
//                             <li><a href=\"#217\" class=\"link-wishlist\" title=\"Add to Wishlist\">Add to Wishlist</a>
//                             </li>
//                          </ul>
//                    </div>
//                    <div class=\"quickshop-link-container\"> <a href=\"/Product/singleproduct/".$book->book_id."\" class=\"quickshop-link\" title=\"Quickshop\">Quickshop</a>
//                    </div>
//                </div>
//              </div>
//              <div class=\"product-shop\">
//                <div class=\"f-fix\">
//                   <h2 class=\"product-name text-center  \"><a href=\"product-detail.html\" title=\"WIASSI Version 12\"> ".$book->book_name." </a></h2>
//                      <div class=\" text-center\">
//                          <div class=\"ratings\">
//                             <div class=\"rating-box\">
//            ";
//            foreach($Rating as $rate)
//            {
//                if($rate->book_id == $book->book_id)
//                {
//                    echo "<div class=\"rating\" style=\"width:".($rate->rating/5*100)."%\"></div>";
//                }
//            }
//            echo "
//            </div> <span class=\"amount\"><a href=\"#\" onclick=\"217\"></a></span>
//                                                            </div>
//                                                        </div>
//                                                        <div class=\"text-center \">
//                                                            <div class=\"price-box\"> <span class=\"regular-price\" id=\"product-price-217\"> <span class=\"price\"  content=\"1200\">".number_format(($book->book_price - ($book->book_price * $book->book_sale)/100),0,',','.')." đ</span> </span>
//                                                            </div>
//                                                        </div>
//                                                    </div>
//                                                </div>
//                                            </div><!-- /.product-item -->
//                                        </li>
//
//            ";
//        }
//        echo "
//            </ul>
//            <div class=\"toolbar-bottom em-box-03\">
//                                        <div class=\"toolbar\">
//                                            <div class=\"pager\">
//                                                <p class=\"amount\"> Items 1 to 12 of {{$Books->count()}} total</p>
//                                                <div class=\"text-right\">
//                                                    ".$Books->appends(['sort'=>'asc'])->links('')."
//                                                </div>
//                                            </div><!-- /.pager -->
//                                        </div>
//                                    </div><!-- /.toolbar-bottom -->
//        ";
//    }
}
