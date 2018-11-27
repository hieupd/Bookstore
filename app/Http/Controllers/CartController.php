<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bt_book;
use Cart;
use Auth;
use App\bt_bill;
use App\bt_billinfo;
use DB;

require "simple_html_dom.php";

class CartController extends Controller
{
    public function getPCheckout()
    {
        if(Auth::check()) {
            $memberid = auth()->user()->id;
            $memberphone = auth()->user()->user_phone;
            $cart_content = Cart::session($memberid)->getContent();
            $cart_totalprice = Cart::session($memberid)->getTotal();
            return view('webclient.Checkout.Checkoutproduct',['Cart_content'=>$cart_content,'Cart_Total'=>$cart_totalprice,'Phonenumber'=>$memberphone]);
        }
        else
            return redirect()->back();
    }
    public function getCart()
    {
        if(Auth::check())
        {
            $memberid = auth()->user()->id;
            $cart_content = Cart::session($memberid)->getContent();
            $cart_qty = Cart::session($memberid)->getTotalQuantity();
            $cart_totalprice = Cart::session($memberid)->getTotal();
            $memberid = Auth::id();
            return view('webclient.Checkout.Cart',['Cart_content'=>$cart_content,'Cart_qty'=>$cart_qty,'Cart_Total'=>$cart_totalprice,'Memeber_id'=>$memberid]);
        }
        else
            return redirect()->back();

    }
    public function getCartx()
    {
        if(Auth::check()) {
            $memberid = auth()->user()->id;
            $cart_content = Cart::session($memberid)->getContent();
            echo $cart_content;
        }

    }
    public function AddtoCart($id)
    {
        if(Auth::check()) {
            $memberid = auth()->user()->id;
            $book_buy = bt_book::where('book_id', $id)->first();
            $book_price = $book_buy->book_price - ($book_buy->book_price * $book_buy->book_sale) / 100;
            Cart::session($memberid)->add(array('id' => $id, 'name' => $book_buy->book_name, 'quantity' => 1, 'price' => $book_price, 'attributes' => array('img' => $book_buy->book_image, 'sale' => $book_buy->book_sale, 'rawprice' => $book_buy->book_price)));
            return redirect()->back();
        }
        else
        {
            return redirect('/login')->with('Thongbao','Vui lòng đăng nhập để sử dụng giỏ hàng !');
        }

    }
    public function ClearCart()
    {
        if(Auth::check()) {
            $memberid = auth()->user()->id;
            Cart::session($memberid)->clear();
            return redirect()->back();
        }
        else
        {
            return redirect('/login')->with('Thongbao','Vui lòng đăng nhập để sử dụng giỏ hàng !');
        }
    }
    public function RemoveCart($id)
    {
        if(Auth::check()) {
            $memberid = auth()->user()->id;
            Cart::session($memberid)->remove($id);
            return redirect()->back();
        }
        else
        {
            return redirect('/login')->with('Thongbao','Vui lòng đăng nhập để sử dụng giỏ hàng !');
        }
    }
    public function UpdateCart(Request $request)
    {
        $memberid = Auth::user()->id;
        if(Auth::check()) {
            $content = Cart::session($memberid)->getContent();
            foreach ($content as $item) {
                $id = $item->id;
                Cart::session($memberid)->update($id, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->$id
                    )
                ));
            }
            return redirect()->back();
        }
            else
                return redirect()->back();
    }
    public function check($memberid)
    {
        $cartcontent = Cart::session($memberid)->getContent();
        foreach ($cartcontent as $item) {
            $book = bt_book::where('book_id','=',$item->id)->first();
            if(($book->book_quantity - $item->quantity) < 0 )
            {
                return false;
            }
        }
        return true;
    }
    public function checkout($memberid , Request $request)
    {
        $this->validate($request,
            [
                'ship_address' => 'required',
            ],
            [
                'ship_address.required' => 'Vui lòng nhập địa chỉ giao hàng !',
            ]);
        if(Auth::check()) {
            $memberid = auth()->user()->id;
            if(!Cart::session($memberid)->isEmpty()) {
                if ($this->check($memberid) == true ) {
                    $cart_totalprice = Cart::session($memberid)->getTotal();
                    $bill = new bt_bill();
                    $bill->member_id = $memberid;
                    $bill->bill_tprice = $cart_totalprice;
                    $bill->bill_status = 'Chưa hoàn thành';
                    $bill->ship_address = $request->ship_address;
                    $bill->save();
                    $billid = $bill->bill_id;
                    $cartcontent = Cart::session($memberid)->getContent();
                    foreach ($cartcontent as $item) {
                        $book = bt_book::where('book_id', '=', $item->id)->first();
                        $billinfo = new bt_billinfo();
                        $billinfo->bill_id = $billid;
                        $billinfo->book_id = $item->id;
                        $billinfo->book_price = $item->attributes->rawprice;
                        $billinfo->book_quantity = $item->quantity;
                        $book = bt_book::where('book_id', $item->id)
                            ->update(['book_quantity' => $book->book_quantity - $item->quantity]);
                        $billinfo->book_sale = $item->attributes->sale;
                        $billinfo->save();
                    }
                    Cart::clear();
                    return redirect()->back()->with('Thongbao', 'Đặt hàng thành công , mặt hàng sẽ sớm được chuyển tới khách hàng !');
                    echo "thành công !";
                } else
                    return redirect()->back()->with('Loi', 'Đặt hàng không thành công, một số mặt hàng có số lượng hàng không đủ để cung cấp cho quý khách, vui lòng giảm số lượng hoặc chờ sách được bổ sung thếm !');
            }
            else
                return redirect()->back()->with('Loi', 'Không có sản phẩm nào trong giỏ hàng !');
        }
        else
        {
            return redirect('/login')->with('Thongbao','Vui lòng đăng nhập để sử dụng giỏ hàng !');
        }
    }
}
