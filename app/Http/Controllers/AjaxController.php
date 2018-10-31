<?php

namespace App\Http\Controllers;

use App\bt_type;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getBooktype($id)
    {
        $booktype = bt_type::where('category_id',$id)->get();
        foreach ($booktype as $tp)
        {
            echo "<option value ='".$tp->type_id."'>".$tp->type_name."</option>";
        }
    }
}
