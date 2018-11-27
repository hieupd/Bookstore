<?php

namespace App;
use http\Env\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class bt_book extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "bt_books";
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'book_id', 'book_name', 'book_date','book_author','book_publish','book_size','book_qpaper',
        'book_page','book_amount','book_dsc','book_sale','book_price','book_zipcode','type_id',
        'book_image','book_language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function getSalePriceAttributes()
    {
        return $this->book_price-($this->book_sale*$this->book_price)/100;
    }
    protected $hidden = [

    ];
}
