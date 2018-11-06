<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bt_book;
use Cart;
use Auth;
use App\bt_bill;
use App\bt_billinfo;
use DB;

class CartController extends Controller
{
    public function getCart()
    {
        $cart_content = Cart::getContent();
        $cart_qty = Cart::getTotalQuantity();
        $cart_totalprice = Cart::getTotal();
        $memberid = Auth::id();
        return view('webclient.checkout',['Cart_content'=>$cart_content,'Cart_qty'=>$cart_qty,'Cart_Total'=>$cart_totalprice,'Memeber_id'=>$memberid]);
    }
    public function getCartx()
    {
        $cart_content = Cart::getContent();
        echo $cart_content;
    }
    public function AddtoCart($id)
    {
        $book_buy = bt_book::where('book_id',$id)->first();
        $book_price = $book_buy->book_price - ($book_buy->book_price * $book_buy->book_sale)/100;
        Cart::add(array('id'=>$id,'name'=>$book_buy->book_name,'quantity'=>1,'price'=>$book_price,'attributes'=>array('img'=>$book_buy->book_image,'sale'=>$book_buy->book_sale,'rawprice'=>$book_buy->book_price)));
        return redirect()->back();
    }
    public function ClearCart()
    {
        Cart::clear();
        return redirect()->back();
    }
    public function RemoveCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
    public function UpdateCart(Request $request)
    {
        if(!Cart::isEmpty()) {
            $content = Cart::getContent();
            foreach ($content as $item) {
                $id = $item->id;
                Cart::update($id, array(
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
    public function checkout($memberid)
    {
        $cart_totalprice = Cart::getTotal();
        $bill = new bt_bill();
        $bill->member_id = $memberid;
        $bill->bill_tprice = $cart_totalprice;
        $bill->bill_status = 'Chưa hoàn thành';
        $bill->save();
        $billinfo = DB::table('bt_bills')->select(DB::raw('MAX(bill_id) as maxbill'))->where('member_id',$memberid)->get();
        $billid = $billinfo[0]->maxbill;

        $cartcontent = Cart::getContent();
        foreach ($cartcontent as $item) {
            $billinfo = new bt_billinfo();
            $billinfo->bill_id = $billid;
            $billinfo->book_id = $item->id;
            $billinfo->book_price = $item->attributes->rawprice;
            $billinfo->book_quantity = $item->quantity;
            $billinfo->book_sale = $item->attributes->sale;
            $billinfo->save();
        }
        Cart::clear();
        return redirect('/Checkout/Cart');

    }
}
