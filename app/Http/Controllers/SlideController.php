<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
class SlideController extends Controller
{
    public function getDanhSach()
    {
    	$slide = slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem()
    {
    	$slide = slide::all();
    	return view('admin.slide.them',['slide'=>$slide]);
    }
    public function XuLyThemSlide(Request $request)
    {
    	$this->validate($request,[
            'tenslide'=>'required|min:3|max:100', 

        ],[
            'tenslide.required'=>'Bạn chưa nhập tên'

        ]);

        $slide = new slide;
        $slide->tenslide=$request->tenslide;
        $slide->noidung=$request->noidung;
        if($request->has('link'))
        	$slide->link=$request->link;


        if($request->hasFile('hinh'))
        {   
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
            	return redirect('admin/slide/them')->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $hinh=str_random(4)."_".$name;
            while (file_exists("img/slide/".$hinh)) {
                $hinh=str_random(4)."_".$name;
            }
            $file->move("img/slide/",$hinh);
            $slide->hinh=$hinh;

        }
        // else
        // {
        //     $hinh->hinh = "";   
        // }

        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm slide thành công!');
    }

    public function getSua($id)
    {
    	$slide = slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function XuLySuaSlide(Request $request,$id)
    {
    	$slide = slide::find($id);
    	$this->validate($request,[
            'tenslide'=>'required|min:3|max:100', 

        ],[
            'tenslide.required'=>'Bạn chưa nhập tên'

        ]);

        $slide->tenslide=$request->tenslide;
        $slide->noidung=$request->noidung;
        if($request->has('link'))
        	$slide->link=$request->link;


        if($request->hasFile('hinh'))
        {   
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') 
            {
            	return redirect('admin/slide/them')->with('loi','Bạn chọn sai định dạng file');
            }
            $name = $file->getClientOriginalName();
             $hinh=str_random(4)."_".$name;
            while (file_exists("img/slide/".$hinh)) {
                $hinh=str_random(4)."_".$name;
            }
            $file->move("img/slide/",$hinh);
            $slide->hinh=$hinh;
        }


        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Cập Nhật thành công!');
    }
    public function XuLyXoa($id)
    {
        $slide=slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công!');
    }
}