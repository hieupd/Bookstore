<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class bt_bill extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bt_bills';
    protected $primaryKey = 'bill_id';
    protected $fillable = [
        'bill_id', 'book_id', 'member_id','bill_count','bill_price','bill_ship_price','bill_sale',
        'bill_tprice','bill_status','bill_dsc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
