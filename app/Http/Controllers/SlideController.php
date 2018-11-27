<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bt_slide;
use DB;
class SlideController extends Controller
{
    public function getSlide()
    {
        $Lslide = DB::table('bt_slides')->orderBy('slide_id','desc')->get();
        $var = ['Lslide'=>$Lslide];
        return view('webadmin.option.slide')->with($var);
    }
    public function getAddslide()
    {
        return view('webadmin.option.addslide');
    }
    public function Addslide(Request $request)
    {
        $slide = new bt_slide();
        $slide->slide_name = $request->slide_name;
        $slide->slide_status = 0;
        if($request->hasFile('slide_image'))
        {
            $file = $request->file('slide_image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/Slide/".$image))
            {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/Slide/",$image);
            $slide->slide_image = $image;
        }
        else
        {
            $slide->slide_image = $request->slide_image;
        }
        $slide->slide_dsc = $request->slide_dsc;
        $slide->save();
        return redirect()->back()->with('Thongbao','Thêm slide thành công !');
    }
    public function DeleteSlide($id)
    {
        $slide = bt_slide::where('slide_id',$id)->first();
        if($slide->slide_image != '' )
        {
            unlink("upload/Slide/".$slide->slide_image);
        }
        $slide->delete();
        return redirect()->back()->with('Thongbao','Xóa slide thành công !');
    }
    public function getUpdateSlide($id)
    {
        $slide = bt_slide::where('slide_id',$id)->first();
        $var = ['Slide'=>$slide];
        return view('webadmin.option.updateslide')->with($var);
    }
    public function updateSlide($id,Request $request)
    {
        $slide = bt_slide::where('slide_id',$id)->first();
        $slide->slide_name = $request->slide_name;
        if($request->hasFile('slide_image'))
        {
            $file = $request->file('slide_image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/Slide/".$image))
            {
                $image = str_random(4)."_".$name;
            }
            if($slide->slide_image !='')
            {
                unlink("upload/Slide/".$slide->slide_image);
            }
            $file->move("upload/Slide/",$image);
            $slide->slide_image = $image;
        }
        $slide->slide_dsc = $request->slide_dsc;
        $slide->save();
        return redirect('/admin/dashboard/slidemanager')->with('Thongbao','Cập nhập slide thành công !');
    }
    public function ActiveSlide($id)
    {
        $slide = bt_slide::where('slide_id',$id)->first();
        if($slide->slide_status == 0)
        {
            $slide->slide_status =1;
        }
        else
        {
            $slide->slide_status =0;
        }
        $slide->save();
        return redirect()->back()->with('Thongbao','Kích hoạt slide thành công !');
    }
}
