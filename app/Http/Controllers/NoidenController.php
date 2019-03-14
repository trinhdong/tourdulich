<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Loaitour;

use App\Noiden;

class NoidenController extends Controller
{
    public function getDanhsach()
    {
        $noiden= Noiden::all();
    	return view('admin.noiden.danhsach',['noiden'=>$noiden]);
    }
    public function getThem()
    {
        $loaitour=Loaitour::all();
    	return view('admin.noiden.them',['loaitour'=>$loaitour]);
    }

    public function XuLyThemNoiDen(Request $request)
    {

        $this->validate($request,[
            'tennoiden'=>'required|unique:Noiden,tennoiden|min:3|max:100 ', 
            'tenloaitour'=>'required'
        ],[
            'tennoiden.required'=>'Bạn chưa nhập tên nơi đến',
            'tennoiden.unique'=>'Tên nơi đến đã tồn tại',
            'tennoiden.min'=>'Tên nơi đến không quá 3 ký tự',
            'tennoiden.max'=>'Tên nơi đến phải có độ dài từ 3 đến 100 ký tự',
            // 'tenloaitour'=>'required'

        ]);

        $noiden= new noiden;
        $noiden->tennoiden=$request->tennoiden;
        $noiden->idloaitour=$request->tenloaitour;
        $noiden->tenkhongdau = changeTitle($request->tennoiden);
        $noiden->save();

        return redirect('admin/noiden/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id)
    {
        $noiden = noiden::find($id);
        $loaitour = loaitour::all();
    	return view('admin.noiden.sua',['noiden'=>$noiden],['loaitour'=>$loaitour]);
    }

    public function XuLySuaNoiDen(Request $request,$id)
    {
        $noiden = noiden::find($id);
        $this->validate($request,
            [
                'tennoiden'=>'required|min:3|max:100'
            ],
            [
                'tennoiden.required'=>'Bạn chưa nhập Tên Nơi Đến!',
                'tennoiden.min'=>'Tên Nơi Đến gồm ít nhất 3 ký tự!',
                'tennoiden.max'=>'Tên Nơi Đến gồm tối đa 100 ký tự!'
            ]);
        $noiden->tennoiden = $request->tennoiden;
        $noiden->idloaitour=$request->tenloaitour;
        $noiden->tenkhongdau = changeTitle($request->tennoiden);
        $noiden->save();
        return redirect('admin/noiden/sua/'.$id)->with('thongbao','Bạn đã Cập nhật thành công');
    }

    public function XuLyXoa($id)
    {
        $noiden= noiden::find($id);
        $noiden->delete();
        return redirect('admin/noiden/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
