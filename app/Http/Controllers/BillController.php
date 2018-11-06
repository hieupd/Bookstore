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
        $bills = bt_bill::join('users','bt_bills.member_id','=','users.id')->get();;
        return view('webadmin.bill.bill',['Bills'=>$bills]);
    }
    public function getupdateBillmanager( $id)
    {
        if(Request::ajax())
        {
            $billstatus = Request::get('billstatus');
            $bill = bt_bill::where('bill_id','=',$id)->first();
            $bill::where('bill_id','=',$id)->update([
                'bill_status' => $billstatus,
            ]);
            return "Success";
        }
    }

    public function getDeleteBill($id)
    {
        $bill = bt_bill::where('bill_id','=',$id)->first();
        if($bill->bill_status == 'Chưa hoàn thành')
        {
            $book = bt_book::where('book_id','=',$bill->book_id)->get()->first();
            $book_quantity =  $book->book_quantity + $bill->bill_count;
            $book::where('book_id','=',$bill->book_id)->update([
                'book_quantity' => $book_quantity,
            ]);
            $billdelete = bt_bill::where('bill_id','=',$id);
            $billdelete->delete();

        }
        else
        {
            $billdelete = bt_bill::where('bill_id','=',$id);
            $billdelete->delete();
        }
        return redirect('/admin/dashboard/billmanager')->with('Thongbao','Xóa hóa đơn thành công ! ');
    }
}
