<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bt_book;
use Cart;

class CartController extends Controller
{
    public function getCart()
    {
        $cart_content = Cart::getContent();
        $cart_qty = Cart::getTotalQuantity();
        $cart_totalprice = Cart::getTotal();
        return view('webclient.checkout',['Cart_content'=>$cart_content,'Cart_qty'=>$cart_qty,'Cart_Total'=>$cart_totalprice]);
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
        Cart::add(array('id'=>$id,'name'=>$book_buy->book_name,'quantity'=>1,'price'=>$book_price,'attributes'=>array('img'=>$book_buy->book_image,'sale'=>$book_buy->book_sale)));
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
}
