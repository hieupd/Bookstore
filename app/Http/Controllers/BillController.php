<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bt_bill;
use App\bt_book;
use Cart;

class BillController extends Controller
{
    public function getBillmanager()
    {
        $bills = bt_bill::join('bt_books','bt_bills.book_id','=','bt_books.book_id')->join('bt_members','bt_bills.member_id','=','bt_members.member_id')->get();;
        return view('webadmin.bill.bill',['Bills'=>$bills]);
    }
    public function getupdateBillmanager(Request $request, $id)
    {
        $bill = bt_bill::where('bill_id','=',$id)->first();
        $bill::where('bill_id','=',$id)->update([
            'bill_status' => $request->slcbill_status,
        ]);
        return redirect('/admin/dashboard/billmanager')->with('Thongbao','Cập nhập hóa đơn thành công ! ');
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
