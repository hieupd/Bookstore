<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\bt_comment;
class CommentController extends Controller
{
    //
    public function postComment($id)
    {
        if(Request::ajax())
        {
           $cmtcontent = Request::get('cmtcontent');
           $Memberid = Request::get('Memberid');
           $comment = new bt_comment();
           $comment->member_id = $Memberid;
           $comment->book_id = $id;
           $comment->comment_content = $cmtcontent;
           $comment->save();
           return "Success";
        }
    }
    public function getComment($id)
    {
        $cmts = bt_comment::join('users','bt_comments.member_id','=','users.id')->where('book_id',$id)->get();
        if($cmts)
        foreach ($cmts as $cmt) {
            echo " 
            <div class=\"row\" id=\"commemtx\">
                <div class=\"row\"><span class=\"usernamecmt\">".$cmt->user_fname."</span></div>
                <br>
                <div class=\"row\" id=\"cmtcontent\">".$cmt->comment_content."</div>
            </div>
            <hr>
            ";
        }

    }
}
