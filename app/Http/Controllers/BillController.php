<?php

namespace App\Http\Controllers;
use Request;
//use Illuminate\Http\Request;
use App\bt_bill;
use App\bt_book;
use Cart;
use App\bt_billinfo;

class BillController extends Controller
{
    public function getBillmanager()
    {
        $bills = bt_bill::join('users','bt_bills.member_id','=','users.id')->orderBy('bill_id','desc')->get();;
        $billinfo = bt_billinfo::join('bt_books','bt_billsinfo.book_id','=','bt_books.book_id')->select('bt_billsinfo.bill_id','bt_billsinfo.book_quantity','bt_books.book_name')->get();
        return view('webadmin.bill.bill',['Bills'=>$bills,'Billinfo'=>$billinfo]);

    }
    public function getupdateBillmanager( $id)
    {
        if(Request::ajax())
        {
            $billstatus = Request::get('billstatus');
            $bill = bt_bill::where('bill_id','=',$id)->first();
            $Lbillinfo = bt_billinfo::where('bill_id','=',$bill->bill_id)->get();
            if($billstatus == "Hủy đơn") {
                foreach ($Lbillinfo as $item) {
                    $book = bt_book::where('book_id', '=', $item->book_id)->first();
                    $book_quantity = $book->book_quantity + $item->book_quantity;
                    $book::where('book_id', '=', $item->book_id)->update([
                        'book_quantity' => $book_quantity,
                    ]);
                }
                $bill::where('bill_id', '=', $id)->update([
                    'bill_status' => $billstatus,
                ]);
            }
            else
            {
                $bill::where('bill_id', '=', $id)->update([
                    'bill_status' => $billstatus,
                ]);
            }
            return "Success";
        }
    }

    public function getDeleteBill($id)
    {
        $bill = bt_bill::where('bill_id','=',$id)->first();
        if($bill->bill_status == 'Chưa hoàn thành')
        {
            $Lbillinfo = bt_billinfo::where('bill_id','=',$bill->bill_id)->get();
            foreach ($Lbillinfo as $item)
            {
                $book = bt_book::where('book_id', '=', $item->book_id)->first();
                $book_quantity =  $book->book_quantity + $item->book_quantity;
                $book::where('book_id','=',$item->book_id)->update([
                    'book_quantity' => $book_quantity,
                ]);
                $item->delete();
            }
            $billdelete = bt_bill::where('bill_id','=',$id);
            $billdelete->delete();
        }
        else
        {
            $billdelete = bt_bill::where('bill_id','=',$id);
            $Lbillinfo = bt_billinfo::where('bill_id','=',$bill->bill_id);
            $Lbillinfo -> delete();
            $billdelete->delete();
        }
        return redirect('/admin/dashboard/billmanager')->with('Thongbao','Xóa hóa đơn thành công ! ');
    }
}
