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
        $cmts = bt_comment::join('users','bt_comments.member_id','=','users.id')->where('book_id',$id)->paginate(3);
        if($cmts)
        foreach ($cmts as $cmt)
        {
            echo    "
                                           <div class=\"bootstrap-tab-text-grid-right\">
												<ul>
													<li><a href=\"#\">".$cmt->user_fname."</a></li>
													<li><a href=\"#\"><span class=\"glyphicon glyphicon-share\" aria-hidden=\"true\"></span>Reply</a></li>
												</ul>
												<hr>
												<p >".$cmt->comment_content."</p>
												<hr>
											</div> ";
        }
    }
}
