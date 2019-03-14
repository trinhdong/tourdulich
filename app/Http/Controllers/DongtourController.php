<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dongtour;
class DongtourController extends Controller
{
    public function getDanhsach()
    {
    	$dongtour = dongtour::all();
        return view('admin.dongtour.danhsach',['dongtour'=>$dongtour]);
    }
    public function getThem()
    {
    	return view('admin.dongtour.them');
    }

    public function XuLyThemDongTour(Request $request)
    {
        $this->validate($request,
            [
                'tendongtour'=>'required|unique:dongtour,tendongtour|min:3|max:100'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'tendongtour.required'=>'Bạn chưa nhập Tên Dòng Tour!',
                'tendongtour.unique' => 'Tên Dòng Tour đã tồn tại, vui lòng nhập lại!',
                'tendongtour.min'=>'Tên Dòng Tour gồm ít nhất 3 ký tự!',
                'tendongtour.max'=>'Tên Dòng Tour gồm tối đa 100 ký tự!'
            ]);
        $dongtour = new dongtour;
        $dongtour->tendongtour = $request->tendongtour;
        $dongtour->tenkhongdau = changeTitle($request->tendongtour);
        $dongtour->save();
        return redirect('admin/dongtour/them')->with('thongbao','Thêm Thành Công');
    }
    public function getSua($id)
    {
        $dongtour = dongtour::find($id);

    	return view('admin.dongtour.sua',['dongtour'=>$dongtour]);
    }

    public function XuLySuaDongTour($id,Request $request)
    {
        $dongtour=dongtour::find($id);
        $this->validate($request,
            [
                'tendongtour'=>'required|min:3|max:100'
                // Unique: Dữ liệu nhập vào không được trùng với dữ liệu hiện tại
                // Cú pháp của unique:tên_bảng,tên_cột
            ],
            [
                'tendongtour.required'=>'Bạn chưa nhập Tên Dòng Tour!',
                'tendongtour.min'=>'Tên Dòng Tour gồm ít nhất 3 ký tự!',
                'tendongtour.max'=>'Tên Dòng Tour gồm tối đa 100 ký tự!'
            ]);
        $dongtour->tendongtour=$request->tendongtour;
        $dongtour->tenkhongdau = changeTitle($request->tendongtour);
        $dongtour->save();
        return redirect('admin/dongtour/sua/'.$id)->with('thongbao','Cập Nhật Thành Công');
    }

    public function XuLyXoa($id)
    {
        $dongtour=dongtour::find($id);
        $dongtour->delete();
        return redirect('admin/dongtour/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
