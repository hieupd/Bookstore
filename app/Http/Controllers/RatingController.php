<?php

namespace App\Http\Controllers;

use Request;
use App\bt_rate;

class RatingController extends Controller
{
    public function postRating($book_id)
    {
        if(Request::ajax())
        {
            $valuerating = Request::get('valuerating');
            $memberid = Request::get('memberid');
            $ratings = bt_rate::where('member_id','=',$memberid)->where('book_id','=',$book_id)->get();
            if($ratings->count() > 0)
            {
                $ratings = bt_rate::where('member_id','=',$memberid)->where('book_id','=',$book_id)->first();
                $ratings::where('member_id','=',$memberid)->where('book_id','=',$book_id)->update(
                  [ 'book_rating' => $valuerating ]
                );
                return "Success";
            }
            else
            {
                $rate = new bt_rate();
                $rate->member_id = $memberid;
                $rate->book_id = $book_id;
                $rate->book_rating = $valuerating;
                $rate->save();
                return "Success";
            }

        }
    }
}
