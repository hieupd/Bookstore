<?php

namespace App;
use App\Http\Middleware\Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class bt_member extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bt_member';

    protected $fillable = [
        'member_id', 'member_name', 'member_fname','member_dob','member_sex','member_address','member_phone',
        'member_email','member_id_card','member_dsc',
        'member_username','member_password','role_id','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'member_password','remember_token'
    ];
}
